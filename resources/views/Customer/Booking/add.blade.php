@extends('layouts.Customer.master')

@section('content')
<style>
    .container {
        background-color: white;
        margin: 30px auto 20px;
        padding: 30px 25px;
        max-width: 800px
    }

    .box {
        border: 2px solid #ddd;
        padding: 10px 20px
    }

    .inputbox {
        border: none;
        outline: none
    }

    .h-blue {
        color: #49bff5;
        margin-bottom: 5px;
        padding-left: 4px;
        font-size: 14px;
        font-weight: 500
    }

    ::placeholder {
        font-size: 18px;
        color: #ddd
    }

    .textmuted {
        color: #ddd
    }

    .outline-none {
        outline: none
    }

    .btn.btn-dark {
        height: 60px;
        font-size: 20px;
        padding: 10px
    }

</style>
<div class="container shadow-lg p-3 mb-5 bg-body rounded">
    <h1>Hainan Kopitiam Table Booking</h1>
    @if (\Session::has('failed'))
    <div class="alert alert-danger">
        <p>{{ \Session::get('failed')}}</p>
    </div><br/>
    @elseif (\Session::has('success'))
        <div class="alert alert-success">
        <p>{{ \Session::get('success')}}</p>
    </div><br/>
    @endif
    <p>Booking Time : 11AM to 8PM</p>
    <a href="{{route('Customer.Booking.timetable')}}" target="popup" onclick="window.open('http://127.0.0.1:8000/Customer/Booking/timetable','popup','width=600,height=600'); return false;">View Booked Time</a>
    <form method="post" action="{{route('Customer.Booking.add.addBooking')}}" id="bookingForm">
        @csrf
        <div class="row">
            <div class="col-md-6 col-12 mb-4">
                <div class="form-control d-flex flex-column">
                    <p class="h-blue">Nickname</p><input class="inputbox" name="nickname" value="{{old('nickname')}}" placeholder="your nickname" type="text">
                </div>
                @error('nickname')
                <div class="alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 col-12 mb-4">
                <div class="form-control d-flex flex-column">
                    <p class="h-blue">Phone number</p> <input class="inputbox" name="phoneNum" value="{{old('phoneNum')}}" placeholder="your phone number" type="text">
                </div>
                @error('phoneNum')
                <div class="alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12 mb-4">
                <div class="form-control d-flex flex-column">
                    <p class="h-blue">Booking DateTime</p> <input class="inputbox" value="{{old('bookingDateTime')}}" name="bookingDateTime" type="datetime-local">
                </div>
                @error('bookingDateTime')
                <div class="alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="form-control d-flex flex-column">
                    <p class="h-blue">Party Size</p> 
                    <select name="partySize" class="border-0 outline-none">
                        <option value="1" @if (old('partySize') == "1") {{ 'selected' }} @endif>1</option>
                        <option value="2" @if (old('partySize') == "2") {{ 'selected' }} @endif>2</option>
                        <option value="3" @if (old('partySize') == "3") {{ 'selected' }} @endif>3</option>
                        <option value="4" @if (old('partySize') == "4") {{ 'selected' }} @endif>4</option>
                        <option value="5" @if (old('partySize') == "5") {{ 'selected' }} @endif>5</option>
                        <option value="6" @if (old('partySize') == "6") {{ 'selected' }} @endif>6</option>
                        <option value="7" @if (old('partySize') == "7") {{ 'selected' }} @endif>7</option>
                        <option value="8" @if (old('partySize') == "8") {{ 'selected' }} @endif>8</option>
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-dark form-control text-center" type="submit">Confirm Book</button>
    </form>
</div>
<script>
</script>
@endsection
