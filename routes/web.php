<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
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

Route::resource('Food', 'FoodController');
Route::resource('Category', 'CategoryController');

//Route::get('beverageManagement', 'FoodController@beverageCreate');
Route::get('dishManagement', 'FoodController@dishCreate');

//Show all Beverages
Route::get('beverageMenu', [FoodController::class, 'beverageIndex']);
//Show all Dishes
Route::get('dishMenu', [FoodController::class, 'dishIndex']);

//Direct to Beverage Management
Route::get('beverageManagement', [FoodController::class, 'beverageCreate']);
//Direct to Beverage Management
Route::get('dishManagement', [FoodController::class, 'dishCreate']);

//Form to Edit Specified Beverage
Route::get('beverageManagement/{id}', [FoodController::class, 'beverageEdit']);
//Form to Edit Specified Dish
Route::get('dishManagement/{id}', [FoodController::class, 'dishEdit']);
      
//Form to Edit Specified Beverage
//Route::get('beverageManagement/{id}', [FoodController::class, 'beverageEdit']);
//Delete Specified Dish
Route::get('dishManagement/destroy/{id}', [FoodController::class, 'dishDestroy']);
     
