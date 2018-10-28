<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Apply;
use App\Access;
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
    public function enrollClass(Request $request){
    	$id=session('studentID');
    	$idClass=(int)$request->input('idClass');
    	$classes=DB::table('classtbl')
    	->select(DB::raw(("MAX(intClassID) as max")))
    	->where('classtbl.bitDelete','=',0)
    	->first();
    	if(($classes-> max) >= $idClass){
    	$enrolled=DB::table('applytbl')
    	->select('intApplyID')
    	->where('intClassID','=',$idClass)
    	->where('intStudentID','=',$id)
    	->first();

    	if($enrolled!=null){

    	 $notification = array(
                'message' => 'Enroll Class Failed ',
                'alert-type' => 'error'
            );


   		 }
   		 else{
   		 	
   		 	 $apply= new Apply;

    	$apply -> intStudentID =$id;
    	$apply -> intClassID =$idClass;
    	$apply -> save();

    	




    	 $notification = array(
                'message' => 'Enroll Class Pending ',
                'alert-type' => 'success'
            );
   		 }}
   		 else{
   		 	 $notification = array(
                'message' => 'Enroll Class Failed ',
                'alert-type' => 'error'
            );
   		 }

   		 return redirect('/student/class')->with($notification);

    }

    public function getQuiz(){
    	$id=session('studentID');

    	$quizzes=DB::table('accesstbl')
    	->join('quiztbl','quiztbl.intQuizID','=','accesstbl.intQuizID')
    	->join('classtbl','classtbl.intClassID','=','accesstbl.intClassID')
    	->join('applytbl','applytbl.intApplyID','=','accesstbl.intApplyID')
    	->join('studentbl','studentbl.intStudentID','=','accesstbl.intStudentID')
    	
    	
    	
    	->select('classtbl.intClassID',DB::raw("(classtbl.strName) as class"),'quiztbl.dtStart', DB::raw("(quiztbl.strName) as quiz "),'quiztbl.intQuizID','accesstbl.intScore')
    	->where('applytbl.intStudentID','=',$id)

    	->where('quiztbl.bitClose','=',0)
    	->where('quiztbl.bitDelete','=',0)
    	->where('classtbl.bitDelete','=',0)
    	->where('applytbl.bitApply','=',0)
    	

    
    	->get();

    	



    	return view('studentViewQuiz')->with(['classes' => $quizzes]);

    }
    public function viewClass(Request $request){
    	$id=session('studentID');
    	$class=$request->input('id');
    	$className=$request->input('className');

    	// $quizzes=DB::table('accesstbl')
    	// ->join('quiztbl','quiztbl.intQuizID','=','accesstbl.intQuizID')
    	// ->join('classtbl','classtbl.intClassID','=','accesstbl.intClassID')
    	// ->join('applytbl','applytbl.intApplyID','=','accesstbl.intApplyID')
    	// ->join('studentbl','studentbl.intStudentID','=','accesstbl.intStudentID')
    	// ->join('teachertbl','teachertbl.intTeacherID','=','accesstbl.intTeacherID')
    	
    	
    	
    	// ->select('classtbl.intClassID',DB::raw("(classtbl.strName) as class"),'quiztbl.dtStart', DB::raw("(quiztbl.strName) as quiz "),'quiztbl.intQuizID','accesstbl.intScore','classtbl.strDescription','classtbl.dtStart',DB::raw("(teachertbl.strName) as teacher"))
    	// ->where('applytbl.intStudentID','=',$id)

    	// ->where('quiztbl.bitClose','=',0)
    	// ->where('quiztbl.bitDelete','=',0)
    	// ->where('classtbl.bitDelete','=',0)
    	// ->where('classtbl.intClassID','=',$class)
    	// ->where('applytbl.bitApply','=',0)
    	

    
    	// ->get();



    	$quizzes=DB::table('quiztbl')
    	->join('classtbl','classtbl.intClassID','=','quiztbl.intClassID')
    	->join('teachertbl','teachertbl.intTeacherID','=','quiztbl.intTeacherID')
    	->select('classtbl.intClassID',DB::raw("(classtbl.strName) as class"),'quiztbl.dtStart', DB::raw("(quiztbl.strName) as quiz "),'quiztbl.intQuizID','classtbl.strDescription','classtbl.dtStart',DB::raw("(teachertbl.strName) as teacher"),'classtbl.intTeacherID')
    	->where('quiztbl.bitClose','=',0)
    	->where('quiztbl.bitDelete','=',0)
    	->where('classtbl.bitDelete','=',0)
    	->where('classtbl.intClassID','=',$class)
    	->get();

    	$arrays=[];

    	foreach ($quizzes as $quiz) {
    		# code...
    		$item=DB::table('questiontbl')
    		->select(DB::raw("COUNT(intQuestionID) as item"))
    		->where('intQuizID','=',$quiz -> intQuizID)
    		->first();
    		
    		array_push($arrays,$item);
    	}


    	

    	$data=array('className' => $className, 'teacherName' => $quizzes[0] -> teacher, 'dtStart' => $quizzes[0] ->dtStart,'description' => $quizzes[0] -> strDescription, 'item' => $arrays);






    	return view('studentViewClass')->with(['classes' => $quizzes])->with($data);


    }


    public function viewQuiz(Request $request){
    	$id=session('studentID');
    	$quizID=(int)$request->input('id');
    	$classID=(int)$request->input('classID');
    	$teacherID=(int)$request->input('teacherID');
    	$className=$request->input('className');
    	$quizName=$request->input('quizName');
//dd($className);

    	$questions=DB::table('questiontbl')
    	->select('intQuestionID','intQuizTypeID','strQuestion','strAnswer','intQuizID')
    	->where('intQuizID','=',$quizID)
    	->get();
    	//dd($questions);
    	$data=[];
    	foreach ($questions as $question) {
    		$choices=DB::table('choicetbl')
    		->select('strChoice','bitCorrect','intQuestionID','intChoiceID')
    		->where('intQuestionID','=',$question -> intQuestionID)
    		->get();
    		array_push($data,$choices);
    	}

    	$dataName=array('className' => $className, 'quizName' => $quizName, 'data' => $data);



    	return view('studentQuiz')->with($dataName)->with(['classes' => $questions]);

    }


}
