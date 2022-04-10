<?php

namespace App\Http\Controllers\Customer\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Account;
use Carbon\Carbon;
use XSLTProcessor;
use Session;
use Illuminate\Http\Request;

class BookingController extends Controller {

    protected $globalUser;

    /**
     * Get login customer booking recent booking record not included cancelled and reached booking
     *
     * @return a list of customer bookings (not included cancelled and reached booking)
     */
    public function getRecentBooking() {
        $this->globalUser = Session::get('loginCus');
        $customer = Account::find($this->globalUser->id);
        $cusBookings = Booking::whereBelongsTo($customer)->where(function ($query) {
                    $query->where('state', 'pending')->orWhere('state', 'booked');
                })->get();

        return view('Customer.Booking.list')->with(compact('cusBookings'));
    }

    public function getPendingBooking() {
        $this->globalUser = Session::get('loginCus');
        $customer = Account::find($this->globalUser->id);
        $cusBookings = Booking::whereBelongsTo($customer)->where('state', 'pending')->get();

        return view('Customer.Booking.list')->with(compact('cusBookings'));
    }

    public function getBookedBooking() {
        $this->globalUser = Session::get('loginCus');
        $customer = Account::find($this->globalUser->id);
        $cusBookings = Booking::whereBelongsTo($customer)->where('state', 'booked')->get();

        return view('Customer.Booking.list')->with(compact('cusBookings'));
    }

    public function getReachedBooking() {
        $this->globalUser = Session::get('loginCus');
        $customer = Account::find($this->globalUser->id);
        $cusBookings = Booking::whereBelongsTo($customer)->where('state', 'reached')->get();

        return view('Customer.Booking.list')->with(compact('cusBookings'));
    }

    public function getCancelledBooking() {
        $this->globalUser = Session::get('loginCus');
        $customer = Account::find($this->globalUser->id);
        $cusBookings = Booking::whereBelongsTo($customer)->where('state', 'cancelled')->get();

        return view('Customer.Booking.list')->with(compact('cusBookings'));
    }

    public function renderBookingTimeTable() {
        $this->globalUser = Session::get('loginCus');
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $bookedDateTimes = Booking::whereDate('booking_datetime',
                                Carbon::today()->format('Y-m-d H:I:S'))->orderBy('booking_datetime', 'asc')
                        ->where(function ($query) {
                            $query->where('state', 'booked')->orWhere('state', 'reached');
                        })->get();

        // Load XML file
        $xml = new \DOMDocument;
        $xml->formatOutput = TRUE;
        $todayBooking = $xml->createElement('todaybooking');
        $xml->appendChild($todayBooking);
        foreach ($bookedDateTimes as $bookedDateTime) {
            $booking = $xml->createElement('booking');
            $nickname = $xml->createElement('nickname', $bookedDateTime->nickname);
            $bookingDatetime = $xml->createElement('bookingDatetime', $bookedDateTime->booking_datetime);
            $partySize = $xml->createElement('partSize', $bookedDateTime->numPersons);

            $todayBooking->appendChild($booking);
            $booking->setAttribute('id', $bookedDateTime->id);

            $booking->appendChild($nickname);
            $booking->appendChild($bookingDatetime);
            $booking->appendChild($partySize);
        }

        // Load XSL file
        $xsl = new \DOMDocument;
        $xsl->load('xsl\BookingTimeTable.xsl');

        // Configure the transformer
        $b = new \XSLTProcessor;

        // Attach the xsl rules
        $b->importStyleSheet($xsl);

        // Transform
        echo $b->transformToXML($xml);
    }

    public function viewAddBooking() {
        $this->globalUser = Session::get('loginCus');
        return view("Customer.Booking.add");
    }

    public function addBooking(Request $request) {
        $this->globalUser = Session::get('loginCus');
        $customer = Account::find($this->globalUser->id);

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $results = $request->validate([
            'nickname' => 'required|regex:/^[a-zA-Z]+$/u|min:4|max:20',
            'phoneNum' => 'required|regex:/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/',
            'bookingDateTime' => 'required|date',
            'partySize' => 'required'
        ]);

        $nickName = $request->nickname;
        $phoneNum = $request->phoneNum;
        $bookingDateTime = strtotime($request->bookingDateTime);
        $partySize = $request->partySize;
        $bookingDateTime = strtotime($request->bookingDateTime);

        $today_date = date('Y-m-d');
        $open_datetime = Carbon::createFromFormat("Y-m-d H:i:s", $today_date . '11:00:00')->timestamp;
        $close_datetime = Carbon::createFromFormat("Y-m-d H:i:s", $today_date . '20:00:00')->timestamp;

        $newBookingDateTime = date('Y-m-d H:i:s', $bookingDateTime);
        $newCarbonDatTime = Carbon::createFromFormat("Y-m-d H:i:s", $newBookingDateTime)->timestamp;
        $bookingDate = date('Ymd', $bookingDateTime);
        $newId = Booking::latest()->first()->id + 1;
        $bookingNo = 'B' . $bookingDate . $newId . $this->globalUser->id;

        $cusBookings = Booking::whereBelongsTo($customer)->whereDate('booking_datetime',
                        Carbon::today()->format('Y-m-d'))->where(function ($query) {
                            $query->where('state', 'pending')->orWhere('state', 'booked');
                        })->exists();
//        dd($cusBookings);
        if (count($results) > 0) {

            if ($cusBookings) {
                Session::flash('failed', 'Booking failed, you had booked today, please try next day!');
                return redirect()->back();
            }

            if ($newCarbonDatTime >= $open_datetime && $newCarbonDatTime <= $close_datetime) {
                Booking::create([
                    'booking_no' => $bookingNo,
                    'nickname' => $nickName,
                    'cus_phoneNum' => $phoneNum,
                    'booking_datetime' => $newBookingDateTime,
                    'state' => 'pending',
                    'numPersons' => $partySize,
                    'account_id' => $this->globalUser->id,
                    'table_num' => NULL,
                ])->save();
                Session::flash('success', 'You had successfully booked!');
                return redirect()->back();
            } else {
                Session::flash('failed', 'Booking failed, Operation time is 11:00am to 8:00pm');
                return redirect()->back();
            }
        }
    }

    public function cancelBooking(Request $request) {
        $this->globalUser = Session::get('loginCus');
        $bookingID = $request->bookingID;
        $booking = Booking::find($bookingID);
        $stateBefore = $booking->state;
        $booking->state->transitionTo(\App\States\Cancelled::class);
        Session::flash('success', "You Successfully cancelled " . $booking->booking_no);
        return redirect()->back();
    }

}
