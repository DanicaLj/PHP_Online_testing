<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
	public function __construct() {
        $this->middleware(['auth','isAdmin']);
    }

    public function index()
    {
    	return view('admin.index');
    }

    /*function getData()
	{
		$data=DB::select('select kategorija from pitanja');

		if(count($data)<0)
		{
			return view('admin.index',$data);
		}
		else
		{
			return view('admin.index');
		}
	}*/
}
