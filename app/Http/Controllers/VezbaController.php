<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Extensions\MongoSessionHandler;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Cookie;
use App\Question;

class VezbaController extends Controller
{
    public function index() 
	{
		//$cookie=Cookie::get('kategorija');
      	$pitanje=Question::orderBy('id','asc')->get()->random(1);
      	Session::put('pitanje',$pitanje);
      	$provere=Session::get('provere');
      	
      	
      	//$pitanje = DB::table('pitanja')->where('kategorija', $cookie)->pluck('pitanje');
      	return view('vezba',['pitanje'=>$pitanje],['provere'=>$provere]);
   	}

   	public function proveri(Request $request)
   	{
		$tacnoPitanje = null;
		$provere=null;
		$pitanje=Session::get('pitanje');
		foreach ($pitanje as $tacno) {
			$tacnoPitanje=$tacno['id'];
		}
		$netacnoPitanje = $request->get($tacnoPitanje);
		  
		if($tacnoPitanje!=$netacnoPitanje)
		{
			$provere=1;
		}
		if($tacnoPitanje==$netacnoPitanje)
		{
			$provere=2;
		}
		
      	Session::put('provere',$provere);
      	return redirect('vezba');
   	}
}
