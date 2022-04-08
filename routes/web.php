<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myPostController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\forumController;
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
    return view('welcome');
});

Route::get("/addNewPost", function () {
    return view('addNewPost');
});

Route::get("/Forum", function () {
    return view('forum');
});

Route::get("/myPost", function () {
    return view('myPost');
});


Route::post('/addNewComment','App\Http\Controllers\commentController@addInByID');
Route::post('/searchPost', 'App\Http\Controllers\myPostController@searchByTopic');
Route::post('/viewComment','App\Http\Controllers\forumController@viewCommentByID');
Route::post('/sendPostID','App\Http\Controllers\commentController@viewByPostID');

Route::resource('comment', commentController::class);
Route::resource('post', forumController::class);
Route::resource('myPost', myPostController::class);

Route::get('viewxmlReplies',[commentController::class,'xmlRead']);


