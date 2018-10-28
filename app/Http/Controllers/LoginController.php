<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Teacher;
use App\Student;
use App\Parents;

class LoginController extends Controller
{
   public function loginChecker(Request $request){
   	$username= $request->input('username');
   	$password= $request->input('password');

   	$checkTeacher=Teacher::where('strUsername','=',$username)->get();
   	$checkStudent=Student::where('strUsername','=',$username)->get();
   	$checkParent=Parents::where('strUsername','=',$username)->get();

   	if (count($checkTeacher) > 0)

    	{	

             if(Hash::check($password,$checkTeacher[0] -> strPassword)){
            $id=$checkTeacher[0] -> intTeacherID;
            $username=$checkTeacher[0] -> strUsername;
                
            session(['teacherID' => $id]);
            session(['teacherUsername' => $username]);
            $notification = array(
                'message' => 'Successfully Login! Welcome '.$username,
                'alert-type' => 'success'
            );
            return redirect('/teacher')->with($notification);
            }
            else{
                 $notification = array(
                'message' => 'Login Failed! Username/Password is incorrect',
                'alert-type' => 'error'
            );

            return redirect('/')->with($notification);

            }
           


    	}
    	elseif (count($checkStudent) > 0){

    		if(Hash::check($password,$checkStudent[0] -> strPassword)){
            $id=$checkStudent[0] -> intStudentID;
            $username=$checkStudent[0] -> strUsername;
                
            session(['studentID' => $id]);
            session(['studentUsername' => $username]);
            $notification = array(
                'message' => 'Successfully Login! Welcome '.$username,
                'alert-type' => 'success'
            );
            return redirect('/student')->with($notification);
            }
            else{
                 $notification = array(
                'message' => 'Login Failed! Username/Password is incorrect',
                'alert-type' => 'error'
            );

            return redirect('/')->with($notification);

            }

    	}

    	elseif (count($checkParent) > 0){

    		if(password_verify($password,$checkParent[0] -> strPassword)){
            $id=$checkParent[0] -> intParentID;
            $username=$checkParent[0] -> strUsername;
                
            session(['parentID' => $id]);
            session(['parentUsername' => $username]);
            $notification = array(
                'message' => 'Successfully Login! Welcome '.$username,
                'alert-type' => 'success'
            );
            return redirect('/parent')->with($notification);
            }
            else{
            	
                 $notification = array(
                'message' => 'Login Failed! Username/Password is incorrect',
                'alert-type' => 'error'
            );

            return redirect('/')->with($notification);

            }

    	}

    	else{

    		 $notification = array(
                'message' => 'Login Failed! Username/Password is incorrect',
                'alert-type' => 'error'
            );

            return redirect('/')->with($notification);


    	}

   
   }
}
