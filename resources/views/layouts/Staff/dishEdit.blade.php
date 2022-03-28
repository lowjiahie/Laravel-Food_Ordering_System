@extends('layouts.Staff.master')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dish Management</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="../../../css/foodManagement.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Update Dish</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <!-- Update Form -->
                        <div class="tab-content">
                            <div id="add-beverage" class="tab-pane fade show active pt-3">
                                @if(!empty($editDish) && $editDish->count())
                                    @foreach($editDish as $dish)
                                        <form role="form">
                                            <div class="form-group"> 
                                                <label for="dish_name">
                                                    <h6>Name</h6>
                                                </label>
                                                <input type="text" id="dish_name" class="form-control" value="{{$dish->foodName}}" required> 
                                            </div>
                                            <div class="form-group"> 
                                                <label for="dish_description">
                                                    <h6>Description</h6>
                                                </label>
                                                <input type="text" id="dish_description" class="form-control" value="{{$dish->foodDescription}}" required> 
                                            </div>
                                            <div class="form-group"> 
                                                <label for="dish_price">
                                                    <h6>Price</h6>
                                                </label>
                                                <input type="text" id="dish_price" class="form-control" value="{{$dish->price}}" required> 
                                            </div>
                                            <div class="form-group"> 
                                                <label for="dish_ranking">
                                                    <h6>Number Placing in Sales</h6>
                                                </label>
                                                <input type="number" id="dish_ranking" class="form-control" value="{{$dish->placingNumberInSales}}" required> 
                                            </div>
                                            <div class="form-group"> 
                                                <label for="dish_quantity">
                                                    <h6>Quantity</h6>
                                                </label>
                                                <input type="number" id="dish_quantity" class="form-control" value="{{$dish->quantity}}" required> 
                                            </div>
                                            <div class="form-group"> 
                                                <label for="dish_image">
                                                    <h6>Upload Image</h6>
                                                </label>
                                                <input type="text" id="dish_image" class="form-control" value="{{$dish->image_path}}" required> 
                                            </div>
                                            <div class="form-group checkboxInline">
                                                <label for=dish_option">
                                                    <h6>Options</h6>
                                                </label></br>
                                                <input id='dishOption' type="checkbox">Seafood-Free
                                                 &#160<input id='dishOption' type="checkbox">Nut-Free
                                                 &#160<input id='dishOption' type="checkbox">Vegetarian-Friendly
                                                 &#160<input id='dishOption' type="checkbox">Vegan-Friendly
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