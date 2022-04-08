@extends('layouts.Customer.master')

@section('content')
<style>
    /* ===== Career ===== */
    .career-form {
        border-radius: 5px;
        padding: 0 16px;
    }

    .career-form .form-control {
        background-color: rgba(255, 255, 255, 0.2);
        border: 0;
        padding: 12px 15px;
        color: #fff;
    }

    .career-form .form-control::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: #fff;
    }

    .career-form .form-control::-moz-placeholder {
        /* Firefox 19+ */
        color: #fff;
    }

    .career-form .form-control:-ms-input-placeholder {
        /* IE 10+ */
        color: #fff;
    }

    .career-form .form-control:-moz-placeholder {
        /* Firefox 18- */
        color: #fff;
    }

    .filter-result .job-box {
        -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
        box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
        border-radius: 10px;
        padding: 10px 35px;
    }
    /* EFFECT 2 ========================================== */
    .effect-2::before{
        position: absolute;
        content: "";
        z-index: -1;
        bottom: 5px;
        left: 30px;
        right: 30px;
        top: 80%;
        background: #aaa;
        box-shadow: 0 0 25px 17px #aaa;
        border-radius: 100px/10px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto mb-4">
            <div class="section-title text-center">
                <h3 class="top-c-sep mt-5">My Bookings</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="career-search mb-60">
                <!--
                                                <form action="#" class="career-form mb-60 bg-dark">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-3 my-3">
                                                            <div class="input-group position-relative">
                                                                <input type="text" class="form-control" placeholder="Enter Booking No" id="search">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-3 my-3">
                                                            <button type="button" class="btn btn-lg btn-block btn-light btn-custom" id="contact-submit">
                                                                Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>-->
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success')}}</p>
                </div><br/>
                @endif

                <div class="filter-result mt-3">
                    <div class="row mb-3">
                        <div class="col-4 col-md-2">
                            <form method="get" action="{{route('Customer.Booking.list.RecentBooking')}}">
                                <button class="btn btn-lg btn-dark">Recent</button>
                            </form>
                        </div>
                        <div class="col-4 col-md-2">
                            <form method="get" action="{{route('Customer.Booking.list.PendingBooking')}}">
                                <button class="btn btn-lg btn-dark">Pending</button>
                            </form>
                        </div>
                        <div class="col-4 col-md-2">
                            <form method="get" action="{{route('Customer.Booking.list.BookedBooking')}}">
                                <button class="btn btn-lg btn-dark">Booked</button>
                            </form>
                        </div>
                        <div class="col-4 col-md-2">
                            <form method="get" action="{{route('Customer.Booking.list.ReachedBooking')}}">
                                <button class="btn btn-lg btn-dark">Reached</button>
                            </form>
                        </div>
                        <div class="col-4 col-md-2">
                            <form method="get" action="{{route('Customer.Booking.list.CancelledBooking')}}">
                                <button class="btn btn-lg btn-dark">Cancelled</button>
                            </form>
                        </div>
                    </div>
                    <p>Number of Bookings : {{count($cusBookings)}}</p>
                    @foreach($cusBookings as $cusBooking)
                    <div class="card mb-3 effect-2">
                        <div class="row g-0">
                            <div class="col-md-3 text-center pb-5 ps-4 pe-4" style="padding-top:80px">
                                <h3 class="fw-bold">{{$cusBooking->state}}</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">Book no : {{$cusBooking->booking_no}}</h5>
                                    <p class="card-text mb-0">Booking details:</p>
                                    <p class="card-text mb-0"><small class="text-muted">Booking Description: {{$cusBooking->state->description()}}</small></p>
                                    <p class="card-text mb-0"><small class="text-muted">Booking Datetime: {{$cusBooking->booking_datetime}}</small></p>
                                    <p class="card-text "><small class="text-muted">PartySize: {{$cusBooking->numPersons}}</small></p>

                                    <p class="card-text mb-0">Contact details:</p>
                                    <p class="card-text"><small class="text-muted">{{$cusBooking->nickname}}-{{$cusBooking->cus_phoneNum}}</small></p>
                                </div>
                            </div>
                            <div class="col-md-3 text-center pb-5 ps-4 pe-4" style="padding-top:75px">
                                @if($cusBooking->state == 'pending' || $cusBooking->state == 'booked')
                                <form method="post" action="{{route('Customer.Booking.list.CancelBooking')}}">
                                    {{ csrf_field() }}
                                    <input id="bookingID" name="bookingID" type="hidden" value="{{$cusBooking->id}}">
                                    <button class="btn btn-danger" type="submit">Cancel</button>
                                </form>
                                @endif
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
