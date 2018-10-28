<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassModel;
use App\Quiz;
use App\Question;
use App\Choice;
use DB;
class TeacherController extends Controller
{
   
    public function getClass(){
        $id=session('teacherID');
        $classes=DB::table('classtbl')
        ->select('intClassID','strName','dtStart','strDescription')
        ->where('bitDelete','=',0)
        ->where('intTeacherID','=',$id)
        ->get();
        //dd($classes);
    	return view('teacherAddClass')->with(['classes' => $classes]);
    }

    public function addClass(Request $request){
    	$name=$request->input('nameClass');
    	$description=$request->input('descriptionClass');
    	$id=session('teacherID');
    	$class= new ClassModel;
    	$class -> strName= $name;
    	$class -> strDescription= $description;
    	$class -> dtStart= now();
    	$class -> bitDelete=0;
    	$class -> intTeacherID= (int)$id;
    	$class -> save();

    	 $notification = array(
                'message' => 'Class Successfully Added ',
                'alert-type' => 'success'
            );

    	return redirect('/teacher/class')->with($notification);
    }
    public function deleteClass(Request $request){
        $id=$request->input('id');
        DB::table('classtbl')
        ->where('intClassID','=',$id)
        ->update(['bitDelete' => 1]);

        return redirect('/teacher/class');
    }
    public function getQuiz(){
        $id=session('teacherID');
        $quiz=DB::table('quiztbl')
        
        ->join('classtbl','quiztbl.intClassID','=','classtbl.intClassID')
        ->select('quiztbl.intQuizID','quiztbl.strName','quiztbl.bitClose','quiztbl.dtStart',DB::raw("(classtbl.strName) AS class"))
        ->where('quiztbl.bitDelete','=',0)
        ->where('quiztbl.intTeacherID','=',$id)
        ->get();
        $classes=DB::table('classtbl')
        ->select('intClassID','strName')
        ->where('bitDelete','=',0)
        ->where('intTeacherID','=',$id)
        ->get();


        //dd($quiz);
        return view('teacherAddQuiz')->with(['quiz' => $quiz,'classes' => $classes]);

    }
    public function addQuiz(Request $request){
        $id=(int)session('teacherID');
        $name=$request->input('nameQuiz');
        $classID=(int)$request->input('classQuiz');
        $quiz= new Quiz;
        $quiz -> strName=$name;
        $quiz -> intClassID=$classID;
        $quiz -> intTeacherID=$id;
        $quiz -> dtStart=now();
        $quiz -> bitDelete=0;
        $quiz -> bitClose=1;
        $quiz -> save();

        return redirect('/teacher/quiz');

    }

    public function addQuestion(Request $request){
        $id=session('teacherID');
        $quizID=$request->input('quizID');
   
        $question=$request->input('questionQuestion');
        $type=$request->input('typeQuestion');
        $multipleChoice=(int)$request->input('choice');
        $choice1=$request->input('choice1Question');
        $choice2=$request->input('choice2Question');
        $choice3=$request->input('choice3Question');
        $choice4=$request->input('choice4Question');
        $trueOrFalse=$request->input('choices');
        $enumeration=$request->input('enumerationQuestion');
        if($multipleChoice!=null){

            $quest= new Question;
            $quest -> intQuizTypeID = (int)$type;
            $quest -> intQuizID = $quizID;
            $quest -> strQuestion = $question;
            if($multipleChoice==1){

            $quest -> strAnswer = $choice1;

            $quest -> save();

            $questionID= $quest -> id;

                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice1;
            $choices -> bitCorrect =1;
            $choices -> save();
                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice2;
            $choices -> bitCorrect =0;
            $choices -> save();
                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice3;
            $choices -> bitCorrect =0;
            $choices -> save();
               $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice4;
            $choices -> bitCorrect =0;
            $choices -> save();



            }
            elseif($multipleChoice==2){
                $quest -> strAnswer = $choice2;
                $quest -> save();

            $questionID= $quest -> id;

                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice1;
            $choices -> bitCorrect =0;
            $choices -> save();
                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice2;
            $choices -> bitCorrect =1;
            $choices -> save();
                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice3;
            $choices -> bitCorrect =0;
            $choices -> save();
               $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice4;
            $choices -> bitCorrect =0;
            $choices -> save();


            } 
            elseif($multipleChoice==3){
                $quest -> strAnswer = $choice3;
                $quest -> save();

            $questionID= $quest -> id;

                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice1;
            $choices -> bitCorrect =0;
            $choices -> save();
                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice2;
            $choices -> bitCorrect =0;
            $choices -> save();
                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice3;
            $choices -> bitCorrect =1;
            $choices -> save();
               $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice4;
            $choices -> bitCorrect =0;
            $choices -> save();


            }
            elseif($multipleChoice==4){
                $quest -> strAnswer = $choice4;
                $quest -> save();

            $questionID= $quest -> id;

                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice1;
            $choices -> bitCorrect =0;
            $choices -> save();
                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice2;
            $choices -> bitCorrect =0;
            $choices -> save();
                $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice3;
            $choices -> bitCorrect =0;
            $choices -> save();
               $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $choice4;
            $choices -> bitCorrect =1;
            $choices -> save();

            }














        }
        elseif ($trueOrFalse!=null) {
            # code...
            if ($trueOrFalse=='True') {
                # code...
            
            $quest= new Question;
            $quest -> intQuizTypeID = (int)$type;
            $quest -> intQuizID = $quizID;
            $quest -> strQuestion = $question;
            $quest -> strAnswer = $trueOrFalse;
            $quest -> save();

            $questionID= $quest -> id;

            $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = 'True';
            $choices -> bitCorrect =0;
            $choices -> save();
            $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = 'False';
            $choices -> bitCorrect =1;
            $choices -> save();


            }
            elseif($trueOrFalse=='False'){
                $quest= new Question;
            $quest -> intQuizTypeID = (int)$type;
            $quest -> intQuizID = $quizID;
            $quest -> strQuestion = $question;
            $quest -> strAnswer = $trueOrFalse;
            $quest -> save();

            $questionID= $quest -> id;

            $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = 'True';
            $choices -> bitCorrect =0;
            $choices -> save();
            $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = 'False';
            $choices -> bitCorrect =1;
            $choices -> save();
            }

            }
            elseif($enumeration!=null){
            $quest= new Question;
            
            $quest -> intQuizTypeID = (int)$type;
            $quest -> intQuizID = $quizID;
            $quest -> strQuestion = $question;
            $quest -> strAnswer = $enumeration;
            $quest -> save();

            $questionID= $quest -> id;

            $choices= new Choice;
            $choices -> intQuestionID =  $questionID;
            $choices -> strChoice = $enumeration;
            $choices -> bitCorrect =0;
            $choices -> save();
        }

        return redirect('/teacher/quiz');

    }

    public function openQuiz(Request $request){
        $id=session('teacherID');
        $quizID=$request->input('id');

        DB::table('quiztbl')
        ->where('intQuizID','=',$quizID)
        ->update(['bitClose' => 0]);
        return redirect('/teacher/quiz');
    }

    public function closeQuiz(Request $request){
        $id=session('teacherID');
        $quizID=$request->input('id');

        DB::table('quiztbl')
        ->where('intQuizID','=',$quizID)
        ->update(['bitClose' => 1]);
        return redirect('/teacher/quiz');
    }


}
