@extends('layouts.Customer.master')

@section('content')
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Beverage Menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .uper {
                margin-top: 50px;
            }
            .set-right{
                right: 0px;
            }
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <div class="container text-center">
              <h1>Online Store</h1>      
              <p>Mission, Vission & Values</p>
            </div>
        </div>
        <div class="container">    
            <div class="row">
                @if(!empty($beverages) && $beverages->count())
                    @foreach($beverages as $value)
                    <div class="col-sm-4">
                      <div class="panel panel-primary">
                        <div class="panel-heading">{{ $value->foodName }}</div>
                        <div class="panel-footer">{{ $value->price }}</div>
                        @if($value->hotDrink === 1)
                            <div class="panel-footer">Hot Drink Available</div>
                        @else
                            <div class="panel-footer">Hot Drink Not Available</div>
                        @endif
                      </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-sm-4"> There are no data. </div>     
                @endif
            </div>
        </div>
    </body>
</html>
@endsection