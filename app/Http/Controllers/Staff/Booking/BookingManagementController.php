<?php

namespace App\Http\Controllers\Staff\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Account;
use Carbon\Carbon;
use Session;
use Spatie\ModelStates\Exceptions\TransitionNotAllowed;
use Illuminate\Http\Request;

class BookingManagementController extends Controller {

    protected $globalUser = 4;

    public function getAllBooking() {
        $cusRecentBookings = Booking::where(function ($query) {
                    $query->where('state', 'pending')->orWhere('state', 'booked');
                })->get();

        return view('Staff.Booking.listbooking')->with(compact('cusRecentBookings'));
    }

    public function updateBookingState(Request $request) {
        $bookingID = $request->id;
        $bookingState = $request->state;

        $booking = Booking::find($bookingID);
        try {
            $stateBefore = $booking->state;
            $booking->state->transitionTo($bookingState);
            Session::flash('success', "This " . $bookingID . " transit from " . $stateBefore . " to " . $bookingState);
            return redirect()->back();
        } catch (\Exception $ex) {
            Session::flash('failed', "This " . $bookingID . " cannot transit from " . $stateBefore . " to " . $bookingState);
            return redirect()->back();
        }
    }

    public function showAllBookingState() {
        $cusPendingBookings = Booking::where('state', 'pending')->get();
        $cusBookedBookings = Booking::where('state', 'booked')->get();
        $cusReachedBookings = Booking::where('state', 'reached')->get();
        $cusCancelledBookings = Booking::where('state', 'cancelled')->get();
        
        return view('Staff.Booking.showAll')->with(compact('cusPendingBookings'
                ,'cusBookedBookings','cusReachedBookings','cusCancelledBookings'));
    }

}
