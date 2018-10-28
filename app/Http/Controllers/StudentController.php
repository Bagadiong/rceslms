<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function getClass(){

    	$id=session('studentID');
        $classes=DB::table('classtbl')
        ->join('applytbl','classtbl.intClassID','=','applytbl.intClassID')
        ->join('teachertbl','classtbl.intTeacherID','=','teachertbl.intTeacherID')
        ->select('classtbl.intClassID',DB::raw("(classtbl.strName) as class"),'classtbl.dtStart','classtbl.strDescription',DB::raw("(teachertbl.strName) as teacher"))
        ->where('classtbl.bitDelete','=',0)
        ->where('applytbl.intStudentID','=',$id)
        ->where('applytbl.bitApply','=',0)
        ->get();
        //dd($classes);
    	return view('studentAddClass')->with(['classes' => $classes]);
    }
}
