<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\Booking\BookingController;
use App\Http\Controllers\Customer\Login\CusLoginController;
use App\Http\Controllers\Staff\Login\StaffLoginController;
use App\Http\Controllers\Staff\Booking\BookingManagementController;

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
})->name('welcome');

Route::view('/booking', 'Customer.Booking.booking')->name('Customer.Booking.booking');
Route::prefix('/Customer')->group(function() {
    Route::get('/Booking/list/RecentBooking', [BookingController::class, 'getRecentBooking'])->name('Customer.Booking.list.RecentBooking');
    Route::get('/Booking/list/PendingBooking', [BookingController::class, 'getPendingBooking'])->name('Customer.Booking.list.PendingBooking');
    Route::get('/Booking/list/BookedBooking', [BookingController::class, 'getBookedBooking'])->name('Customer.Booking.list.BookedBooking');
    Route::get('/Booking/list/ReachedBooking', [BookingController::class, 'getReachedBooking'])->name('Customer.Booking.list.ReachedBooking');
    Route::get('/Booking/list/CancelledBooking', [BookingController::class, 'getCancelledBooking'])->name('Customer.Booking.list.CancelledBooking');
    Route::post('/Booking/list/cancelBooking', [BookingController::class, 'cancelBooking'])->name('Customer.Booking.list.CancelBooking');
    Route::get('/Booking/add/viewAddBooking', [BookingController::class, 'viewAddBooking'])->name('Customer.Booking.add.viewAddBooking');
    Route::post('/Booking/add/addBooking', [BookingController::class, 'addBooking'])->name('Customer.Booking.add.addBooking');
    Route::get('/Booking/timetable', [BookingController::class, 'renderBookingTimeTable'])->name('Customer.Booking.timetable');
    Route::get('/Login/logout', [CusLoginController::class, 'logOutUser'])->name('Customer.Login.logOut');
    Route::get('/Login/{id}', [CusLoginController::class, 'loginUser']);
});

Route::view('/booking', 'Staff.Booking.booking')->name('Staff.Booking.booking');
Route::prefix('/Staff')->group(function() {
    Route::get('/Booking/listbooking', [BookingManagementController::class, 'getAllBooking'])->name('Staff.Booking.listbooking');
    Route::get('/Booking/showAll', [BookingManagementController::class, 'showAllBookingState'])->name('Staff.Booking.showAll');
    Route::post('/Booking/listbooking/updateBookingState', [BookingManagementController::class, 'updateBookingState'])->name('Staff.Booking.listbooking.updateBookingState');
    Route::get('/Login', [StaffLoginController::class, 'loginUser']);
    Route::get('/Login/logout', [StaffLoginController::class, 'logOutUser'])->name('Staff.Login.logOut');;
});

