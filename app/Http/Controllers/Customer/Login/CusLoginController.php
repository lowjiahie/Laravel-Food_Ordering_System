<?php

namespace App\Http\Controllers\Customer\Login;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Session;
use Illuminate\Http\Request;

class CusLoginController extends Controller {

    public function loginUser($id) {
        $loginUser = Account::find($id);

        Session::put('loginCus', $loginUser);

        return redirect()->route('Customer.Booking.add.viewAddBooking');
    }

    public function logOutUser() {
        Session::forget('loginCus');  

        return redirect()->route('welcome');
    }

}
