<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Question;
use App\User;
use Auth;
class OdgovoriController extends Controller
{	   
	public function ponovo_provera(Request $request)
	{
		$cookie=Cookie::get('kategorija');
		$pitanja=Question::where('kategorija','=', $cookie)->orderBy('id','asc')->get();
		$tacnaPitanja =[];
		$netacnaPitanja =[];

		foreach ($pitanja as $pitanje) {
		  array_push($tacnaPitanja,$pitanje['id']);
		}
		foreach ($pitanja as $pitanje) {
    		for($i = 1; $i <100; $i++)
     		{
     			if($pitanje['id']==$i)
         		{
            	array_push($netacnaPitanja,$request->get($i));
         		}
     		}   
		  }
		$brojacNetacnih= count(array_diff_assoc($tacnaPitanja, $netacnaPitanja));
	    $brojPitanja=Question::where('kategorija','=', $cookie)->count();
	    $broj=$brojPitanja-$brojacNetacnih;
	    User::where('id','=', Auth::user()->id)->update(['broj_bodova'=>$broj]);

	    $korisnici=Auth::user()->id;
	    //$coo = Cookie::queue('korisnici', $korisnici);
	    session(['korisnici' => $korisnici]);
	    return view('zavrsen_test');
	}
}
