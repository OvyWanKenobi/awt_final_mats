<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicAPIController;
use App\Http\Controllers\QuizAPIController;
use App\Http\Controllers\StudentCourseAPIController;
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


Route::get('/topics/list',[TopicAPIController::class,'list']);
Route::get('/topics/get/{id}',[TopicAPIController::class,'get']);
Route::post('/topics/add',[TopicAPIController::class,'add']);
Route::put('/topics/update/{id} ',[TopicAPIController::class,'update']);
Route::delete('/topics/delete/{id}',[TopicAPIController::class,'delete']);


Route::get('/quiz/list',[QuizAPIController::class,'list']);
Route::get('/quiz/get/{id}',[QuizAPIController::class,'get']);
Route::post('/quiz/add',[QuizAPIController::class,'add']);
Route::put('/quiz/update/{id}',[QuizAPIController::class,'update']);
Route::delete('/quiz/delete/{id}',[QuizAPIController::class,'delete']);


Route::get('/studentcourse/list',[StudentCourseAPIController::class,'list']);
Route::get('/studentcourse/get/{id}',[StudentCourseAPIController::class,'get']);
Route::post('/studentcourse/add',[StudentCourseAPIController::class,'add']);
Route::put('/studentcourse/update/{id}',[StudentCourseAPIController::class,'update']);
Route::delete('/studentcourse/delete/{id}',[StudentCourseAPIController::class,'delete']);

