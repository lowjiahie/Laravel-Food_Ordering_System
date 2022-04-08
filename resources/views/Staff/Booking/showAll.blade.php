@extends('layouts.Staff.master')

@section('content')
<div class="container">
    <h2>Pending Booking</h2>
    <div class="row">
        <p>Num of Pending Bookings : {{count($cusPendingBookings)}}</p>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Booking No</th>
                        <th scope="col">Booking Datetime</th>
                        <th scope="col">Nickname</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Party Size</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cusPendingBookings as $cusPendingBooking)
                    <tr>
                        <th scope="row">{{$cusPendingBooking->id}}</th>
                        <td>{{$cusPendingBooking->booking_no}}</td>
                        <td>{{$cusPendingBooking->booking_datetime}}</td>
                        <td>{{$cusPendingBooking->nickname}}</td>
                        <td>{{$cusPendingBooking->cus_phoneNum}}</td>
                        <td>{{$cusPendingBooking->state}}</td>
                        <td>{{$cusPendingBooking->numPersons}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h2>Booked Booking</h2>
    <div class="row">
        <p>Num of Booked Bookings : {{count($cusBookedBookings)}}</p>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Booking No</th>
                        <th scope="col">Booking Datetime</th>
                        <th scope="col">Nickname</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Party Size</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cusBookedBookings as $cusBookedBooking)
                    <tr>
                        <th scope="row">{{$cusBookedBooking>id}}</th>
                        <td>{{$cusBookedBooking->booking_no}}</td>
                        <td>{{$cusBookedBooking->booking_datetime}}</td>
                        <td>{{$cusBookedBooking->nickname}}</td>
                        <td>{{$cusBookedBooking->cus_phoneNum}}</td>
                        <td>{{$cusBookedBooking->state}}</td>
                        <td>{{$cusBookedBooking->numPersons}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h2>Reached Booking</h2>
    <div class="row">
        <p>Num of Reached Bookings : {{count($cusReachedBookings)}}</p>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Booking No</th>
                        <th scope="col">Booking Datetime</th>
                        <th scope="col">Nickname</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Party Size</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cusReachedBookings as $cusReachedBooking)
                    <tr>
                        <th scope="row">{{$cusReachedBooking->id}}</th>
                        <td>{{$cusReachedBooking->booking_no}}</td>
                        <td>{{$cusReachedBooking->booking_datetime}}</td>
                        <td>{{$cusReachedBooking->nickname}}</td>
                        <td>{{$cusReachedBooking->cus_phoneNum}}</td>
                        <td>{{$cusReachedBooking->state}}</td>
                        <td>{{$cusReachedBooking->numPersons}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h2>Cancelled Booking</h2>
    <div class="row">
        <p>Num of Cancelled Bookings : {{count($cusCancelledBookings)}}</p>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Booking No</th>
                        <th scope="col">Booking Datetime</th>
                        <th scope="col">Nickname</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Party Size</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cusCancelledBookings as $cusCancelledBooking)
                    <tr>
                        <th scope="row">{{$cusCancelledBooking->id}}</th>
                        <td>{{$cusCancelledBooking->booking_no}}</td>
                        <td>{{$cusCancelledBooking->booking_datetime}}</td>
                        <td>{{$cusCancelledBooking->nickname}}</td>
                        <td>{{$cusCancelledBooking->cus_phoneNum}}</td>
                        <td>{{$cusCancelledBooking->state}}</td>
                        <td>{{$cusCancelledBooking->numPersons}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
