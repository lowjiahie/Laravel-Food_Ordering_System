@extends('layouts.Staff.master')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beverage Management</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="../../../css/foodManagement.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Update Beverage</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <!-- Update Form -->
                        <div class="tab-content">
                            <div id="add-beverage" class="tab-pane fade show active pt-3">
                                @if(!empty($editBeverage) && $editBeverage->count())
                                    @foreach($editBeverage as $beverage)
                                        <form role="form">
                                            <div class="form-group"> 
                                                <label for="beverage_name">
                                                    <h6>Name</h6>
                                                </label>
                                                <input type="text" id="beverage_name" class="form-control" value="{{$beverage->foodName}}" required> 
                                            </div>
                                            <div class="form-group"> 
                                                <label for="beverage_description">
                                                    <h6>Description</h6>
                                                </label>
                                                <input type="text" id="beverage_description" class="form-control" value="{{$beverage->foodDescription}}" required> 
                                            </div>
                                            <div class="form-group"> 
                                                <label for="beverage_price">
                                                    <h6>Price</h6>
                                                </label>
                                                <input type="text" id="beverage_price" class="form-control" value="{{$beverage->price}}" required> 
                                            </div>
                                            <div class="form-group"> 
                                                <label for="beverage_ranking">
                                                    <h6>Number Placing in Sales</h6>
                                                </label>
                                                <input type="number" id="beverage_ranking" class="form-control" value="{{$beverage->placingNumberInSales}}" required> 
                                            </div>
                                            <div class="form-group"> 
                                                <label for="beverage_quantity">
                                                    <h6>Quantity</h6>
                                                </label>
                                                <input type="number" id="beverage_quantity" class="form-control" value="{{$beverage->quantity}}" required> 
                                            </div>
                                            <div class="form-group"> 
                                                <label for="beverage_image">
                                                    <h6>Upload Image</h6>
                                                </label>
                                                <input type="text" id="beverage_image" class="form-control" value="{{$beverage->image_path}}" required> 
                                            </div>
                                            <div class="form-group checkboxInline">
                                                <label for=dish_option">
                                                    <h6>Options</h6>
                                                </label></br>
                                                <input id='bevOption' type="checkbox">Hot Drink
                                                 &#160<input id='bevOption' type="checkbox">Cold Drink
                                                 &#160<input id='bevOption' type="checkbox">Caffeinated
                                            </div>
                                            <div class="card-footer"> 
                                                <input type="button" onclick="check_empty()" class="subscribe btn btn-primary btn-block shadow-sm" value="Submission">
                                            </div>
                                        </form>
                                    @endforeach
                                @else
                                    <div class="col-sm-4"> There are no data. </div>     
                                @endif
                            </div>        
                            <!-- End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
@endsection