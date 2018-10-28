<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function teacher(){
		return view('teacher');
	}
	public function student(){
		return view('student');
	}
   	public function parents(){
   		return view('parents');
   	}
   	
   
}
