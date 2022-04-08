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
            table{
                margin-top: 5%
            }
            .form-group{
                margin-top: 10%
            }
        </style>
    </head>
    <body>
        <table class="table align-middle mb-0  bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price(RM)</th>
                    <th>Order Quantity</th>
                    <th>Options</th>
                    <th>Add to Cart</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($beverages) && $beverages->count())
                @foreach($beverages as $value)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                src="{{asset('img/'. $value->image_path) }}"
                                alt=""
                                style="width: 100px; height: 100px"
                                class="rounded-circle"
                                />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $value->foodName }}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{ $value->foodDescription }}</td>
                    <td>{{ $value->price }}</td>
                    <td><input type="number" name="quantity"/></td>
                    <td>
                        @if($value->hotDrink === 1)
                        <div class="text-muted mb-0">
                            @if($value->coldDrink === 1)
                            <input type='checkbox'>Hot</input>
                            <input type='checkbox'>Cold</input>
                            @else
                            <div class="text-muted mb-0">Hot Only</div>
                            @endif
                        </div>
                        @endif
                        @if($value->hotDrink === 0)
                        <div class="text-muted mb-0">
                            @if($value->coldDrink === 1)
                            <div class="text-muted mb-0">Cold Only</div>
                            @endif
                        </div>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm btn-rounded">
                            Add to Cart
                        </button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-bold mb-1">No Data Found</p>
                            </div>
                        </div>
                    </td>
                </tr>  
                @endif
            </tbody>
        </table>
        {!! $beverages->links() !!}
    </body>
</html>
@endsection