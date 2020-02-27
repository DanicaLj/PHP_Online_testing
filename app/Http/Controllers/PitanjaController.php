<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;
use App\Http\Requests;
use Cookie;
use App\Question;
use Illuminate\Support\Facades\Input;
class PitanjaController extends Controller
{
   public function odabir(Request $request)
   {
      $value=$request->get('izaberi');
      $broj=$request->input('broj');
      $cookie = Cookie::queue('kategorija', $value);
      return redirect('admin')->with('status', 'Uspesno ste izabrali kategoriju!');
   }
	public function index() 
	{
		$cookie=Cookie::get('kategorija','lako');
      $pitanje=Question::where('kategorija','=', $cookie)->orderBy('id','asc')->get();
      //$pitanje = DB::table('pitanja')->where('kategorija', $cookie)->pluck('pitanje');
      //return view('pitanja_'.$cookie,['pitanje'=>$pitanje]);
      return view('pitanja',['pitanje'=>$pitanje]);
   }
   
   public function provera_korisnika()
   {
      //$value=Cookie::get('korisnici');
      $value=session('korisnici');
      if(Auth::user()->id==$value)
      {
         return redirect('home')->with('status', 'Vec ste radili test!');
      }
      return redirect('pitanja');   
   }

   public function create(Request $request)
   {
      $pitanje= new Question;

      $pitanje->pitanje=Input::get('pitanje');
      $pitanje->kategorija=Input::get('odaberi');
      $pitanje->odgovor=Input::get('odgovor');
      $pitanje->netacan_odgovor=Input::get('netacan_odgovor');
      $pitanje->netacan_odgovor2=Input::get('netacan_odgovor2');

      $pitanje->save();

      return redirect('admin')->with('poruka', 'Uspesno ste uneli novo pitanje!');
   }
}
