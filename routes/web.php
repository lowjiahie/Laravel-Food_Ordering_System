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

Session::put("logged_in", "5");
Session::forget("logged_in");
Session::get('logged_in');
        
Route::resource('Food', 'FoodController');
Route::resource('Category', 'CategoryController');

Route::get('viewxmlhandbook', [FoodController::class, 'xmlRead']);

Route::post('/addDish', [FoodController::class, 'storeDish']);
Route::post('/addBeverage', [FoodController::class, 'storeBeverage']);
Route::post('/addCategory', [FoodController::class, 'storeCategory']);

//Show all Beverages
Route::get('beverageMenu', [FoodController::class, 'beverageIndex']);
//Show all Dishes
Route::get('dishMenu', [FoodController::class, 'dishIndex']);

//Direct to create Dish and Beverage
Route::get('createFood', [FoodController::class, 'foodCreate']);

//Direct to edit Dish list
Route::get('editBeverage', [FoodController::class, 'beverageCreated']);
//Direct to edit Beverage list
Route::get('editDish', [FoodController::class, 'dishCreated']);
//Direct to edit Category list
Route::get('editCategory', [FoodController::class, 'categoryCreated']);

//Form to Edit Specified Beverage
Route::get('beverageEditForm/{id}', [FoodController::class, 'beverageEdit']);
//Form to Edit Specified Dish
Route::get('dishEditForm/{id}', [FoodController::class, 'dishEdit']);
//Form to Edit Specified Category
Route::get('categoryEditForm/{id}', [FoodController::class, 'categoryEdit']);

//Submit Edit Form Specified Beverage
Route::post('updateBeverage/{id}', [FoodController::class, 'updateBeverage']);
//Submit Edit Form Specified Dish
Route::post('updateDish/{id}', [FoodController::class, 'updateDish']);
//Submit Edit Form Specified Dish
Route::post('updateCategory/{id}', [FoodController::class, 'updateCategory']);
//Submit Edit Form Specified Dish Image
Route::post('updateDishImage/{id}', [FoodController::class, 'updateDishImage']);
//Submit Edit Form Specified Beverage Image
Route::post('updateBeverageImage/{id}', [FoodController::class, 'updateBeverageImage']);
      
//Delete Specified Dish
Route::get('editDish/destroy/{id}', [FoodController::class, 'dishDestroy']);
//Delete Specified Beverage
Route::get('editBeverage/destroy/{id}', [FoodController::class, 'beverageDestroy']);
//Delete Specified Category
Route::get('editCategory/destroy/{id}', [FoodController::class, 'categoryDestroy']);
