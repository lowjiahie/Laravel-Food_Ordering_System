@extends('layouts.Staff.master')

@section('content')
<div class="container">
    <h2>Recent Booking</h2>
    <p>Num of Recent Bookings : {{count($cusRecentBookings)}}</p>
    <div class="row">
        @if (\Session::has('failed'))
        <div class="alert alert-danger">
            <p>{{ \Session::get('failed')}}</p>
        </div><br/>
        @elseif (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success')}}</p>
        </div><br/>
        @endif
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
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cusRecentBookings as $cusRecentBooking)
                    <tr>
                        <th scope="row">{{$cusRecentBooking->id}}</th>
                        <td>{{$cusRecentBooking->booking_no}}</td>
                        <td>{{$cusRecentBooking->booking_datetime}}</td>
                        <td>{{$cusRecentBooking->nickname}}</td>
                        <td>{{$cusRecentBooking->cus_phoneNum}}</td>
                        <td>{{$cusRecentBooking->state}}</td>
                        <td>{{$cusRecentBooking->numPersons}}</td>
                        <td>
                            <form method="post" action="{{route('Staff.Booking.listbooking.updateBookingState')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$cusRecentBooking->id}}">
                                <select class="custom-select" id="state" name="state">
                                    <option value="pending" @if ( $cusRecentBooking->state == "pending") {{ 'selected' }} @endif>pending</option>
                                    <option value="booked" @if ( $cusRecentBooking->state == "booked") {{ 'selected' }} @endif>booked</option>
                                    <option value="reached" @if ( $cusRecentBooking->state == "reached") {{ 'selected' }} @endif>reached</option>
                                    <option value="cancelled" @if ( $cusRecentBooking->state == "cancelled") {{ 'selected' }} @endif>cancelled</option>
                                </select>
                                <button class="btn btn-primary">submit</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
