<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Teacher;
use App\Student;
use App\Parents;

class SignUpController extends Controller
{
   public function signUpTeacher(Request $request){
   	$name= $request->input('nameTeacher');
   	$email= $request->input('emailTeacher');
   	$username=$request->input('usernameTeacher');
   	$password=$request->input('passwordTeacher');
   	$passwordHashed=Hash::make($password);

   	$teacher= new Teacher;
   	$teacher -> strName = $name;
   	$teacher -> strEmail = $email;
   	$teacher -> strUsername = $username;
   	$teacher -> strPassword = $passwordHashed;
   	$teacher -> save();
   	return redirect('/');



   }
    public function signUpStudent(Request $request){
    $name= $request->input('nameStudent');
   	$email= $request->input('emailStudent');
   	$username=$request->input('usernameStudent');
   	$password=$request->input('passwordStudent');
   	$passwordHashed=Hash::make($password);

   	$student= new Student;
   	$student -> strName = $name;
   	$student -> strEmail = $email;
   	$student -> strUsername = $username;
   	$student -> strPassword = $passwordHashed;
   	$student -> save();
   	return redirect('/');
   	
   }
    public function signUpParent(Request $request){

    	$name= $request->input('nameParent');
   	$email= $request->input('emailParent');
   	$username=$request->input('usernameParent');
   	$password=$request->input('passwordParent');
   	$passwordHashed=Hash::make($password);

   	$parents= new Parents;
   	$parents -> strName = $name;
   	$parents -> strEmail = $email;
   	$parents -> strUsername = $username;
   	$parents -> strPassword = $passwordHashed;
   	$parents -> save();
   	return redirect('/');
   	
   }
}
