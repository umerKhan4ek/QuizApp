<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LimitController;

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

Route::get('/',[LimitController::class,'index'] );


route::get('/limit', [LimitController::class,'LimitQuizForm']);

route::post('/limit', [LimitController::class,'submit'])->name('QuizLimitForm');

route::get('/questionCreation/{id}',[LimitController::class,'createQuestions'])->name('QuestionCreationForm');

route::post('/questionCreation',[LimitController::class,'createQuizQuestions'])->name('createQuizQuestions');

// Delete The quiz Along with Questions
route::get('/quizDelete/{id}',[LimitController::class,'DeleteQuiz'])->name('quiz.delete');

// Attempt Quiz
route::get('/attemptQuiz/{id}',[LimitController::class,'attemptQuiz'])->name('quiz.Attempt');
