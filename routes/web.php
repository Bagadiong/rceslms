<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('/loginChecker','LoginController@loginChecker');
Route::post('/signUpTeacher','SignUpController@signUpTeacher');
Route::post('/signUpStudent','SignUpController@signUpStudent');
Route::post('/signUpParent','SignUpController@signUpParent');
Route::get('/teacher','PagesController@teacher');
Route::get('/student','PagesController@student');
Route::get('/parent','PagesController@parents');

Route::get('/teacher/class','TeacherController@getClass');
Route::post('/addClass','TeacherController@addClass');
Route::post('/teacher/class/delete','TeacherController@deleteClass');

Route::get('/teacher/quiz','TeacherController@getQuiz');
Route::post('/addQuiz','TeacherController@addQuiz');

Route::post('/openQuiz','TeacherController@openQuiz');
Route::post('/closeQuiz','TeacherController@closeQuiz');

Route::post('/addQuestion','TeacherController@addQuestion');

Route::get('/student/class','StudentController@getClass');



