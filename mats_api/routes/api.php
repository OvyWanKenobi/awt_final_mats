<?php

use App\Http\Controllers\CourseAPIController;
use App\Http\Controllers\ForumAPIController;
use App\Http\Controllers\InstructorAPIController;
use App\Http\Controllers\PublicAPIController;
use App\Http\Controllers\TopicAPIController;
use App\Http\Controllers\QuizAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/instructors',[InstructorAPIController::class,'instructors']);
Route::get('/instructorsbydept/{catid}',[InstructorAPIController::class,'instructorsbydept']);
Route::get('/getinstructor/{id}',[InstructorAPIController::class,'getinstructor']);
Route::put('/editinstructor/{id}',[InstructorAPIController::class,'editinstructor']);

Route::get('/coursesbyins/{insid}',[CourseAPIController::class,'coursesbyins']);
Route::get('/getcourse/{id}',[CourseAPIController::class,'getcourse']);
Route::post('/addcourse',[TopicAPIController::class,'addcourse']);
Route::get('/editcourse/{id}',[CourseAPIController::class,'editcourse']);
Route::get('/deletecourse/{id}',[CourseAPIController::class,'deletecourse']);


Route::get('/gettopic/{id}',[TopicAPIController::class,'gettopic']);
Route::post('/addtopic',[TopicAPIController::class,'addtopic']);
Route::put('/edittopic/{id} ',[TopicAPIController::class,'edittopic']);
Route::delete('/deletetopic/{id}',[TopicAPIController::class,'deletetopic']);


Route::post('/addquiz',[QuizAPIController::class,'addquiz']);
Route::put('/edittopic/{id}',[QuizAPIController::class,'editquiz']);
Route::delete('/deletetopic/{id}',[QuizAPIController::class,'deletequiz']);


Route::get('/forums',[ForumAPIController::class,'forums']);
Route::get('/forum/{id}',[ForumAPIController::class,'getforum']);

Route::post('/register',[PublicAPIController::class,'register']);
Route::post('/login',[PublicAPIController::class,'login']);
Route::post('/sendmail',[PublicAPIController::class,'sendmail']);