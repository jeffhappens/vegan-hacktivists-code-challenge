<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

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

Route::get('/', [ PageController::class, 'home' ] )->name('home');
Route::post('/', [ QuestionController::class, 'addQuestion' ] );

Route::get('/question/{id}/answers', [ AnswerController::class, 'displayAnswers' ])->name('answers');
Route::post('/answer/store', [ AnswerController::class, 'storeAnswer' ]);