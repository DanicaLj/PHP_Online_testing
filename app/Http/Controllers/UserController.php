<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
//Importuje modele
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Ovo omgucava flash message 
use Session;

class UserController extends Controller {

    public function __construct() {
        $this->middleware(['auth','isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
    //Get all users and pass it to the view
        $users = User::all(); 
        return view('admin.users.index')->with('users', $users);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
    //Get all roles and pass it to the view
        $roles = Role::get();
        return view('admin.users.create', ['roles'=>$roles]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
    //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        $user = User::create($request->only('email', 'name', 'password')); //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
    //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();            
            $user->assignRole($role_r); //Assigning role to user
            }
        }        
    //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully added.');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        return redirect('users'); 
    }

    /**
    * Prikazuje formu za editovan resoures.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        $user = User::findOrFail($id); //Dobija usera sa izabranim id
        $roles = Role::get(); //Uzima se rolls

        return view('admin.users.edit', compact('user', 'roles')); //Prosledjuje usera i roles u view

    }

    /**
    * Update-uje tacan resource u storeg-u.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Uzima role sa izbranim id-ijem

    //Validiera ime, email i lozinku    
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);
        $input = $request->only(['name', 'email', 'password']); //Prikazuje polja za ime, email i lozinku
        $roles = $request['roles']; //Prikazuje sve rol-ove
        $user->fill($input)->save();

        if (isset($roles)) {        
            $user->roles()->sync($roles);  //Ako je jedna ili vise rol-ova izabrano povezati ih sa korisnikom          
        }        
        else {
            $user->roles()->detach(); //Ako ni jedan role nije izabran, ukloniti postojeci role koji je povezan za korisnika
        }
        return redirect()->route('users.index')
            ->with('flash_message',
             'Korisnik je uspesno editovan.');
    }

    /**
    * Ukloniti izabran resource iz storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
    //Pronalazi usera sa odgovarajucim id-ijem i brise ga
        $user = User::findOrFail($id); 
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
             'Korisnik je uspesno obrisan.');
    }
    
}