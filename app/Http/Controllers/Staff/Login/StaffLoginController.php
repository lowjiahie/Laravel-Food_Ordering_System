<?php

namespace App\Http\Controllers\Staff\Login;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Session;
use Illuminate\Http\Request;

class StaffLoginController extends Controller {

    public function loginUser() {
        return redirect()->route('Staff.Booking.listbooking');
    }

    public function logOutUser() {

        return redirect()->route('welcome');
    }

}
