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
                    <h1 class="display-6">Create Management</h1>
                </div>
            </div> <!-- End -->
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div class="card ">
                        <div class="card-header">
                            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                <!-- Credit card form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item"> <a data-toggle="pill" href="#adddish" class="nav-link"> <i class="fas fa-folder"></i>&#160 Dish</a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#addbeverage" class="nav-link"> <i class="fas fa-folder"></i>&#160 Beverage</a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#addcategory" class="nav-link"> <i class="fas fa-folder"></i>&#160 Category</a> </li>
                                </ul>
                            </div> 
                            <!-- End -->
                            <!-- Add Dish form content -->
                            <div class="tab-content">
                                <!-- Add Dish -->
                                <div id="adddish" class="tab-pane fade pt-3">
                                    <form role="form" action="{{url('addDish')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group"> 
                                            <label for=foodName">
                                                <h6>Name</h6>
                                            </label>
                                            <input type="text" name="foodName" class="form-control @error('foodName') is-invalid @enderror" > 
                                            @error('foodName')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for=category">
                                                <h6>Category</h6>
                                            </label>
                                            <select name="category" id="type" class="form-control @error('category') is-invalid @enderror">
                                                @if(!empty($categories) && $categories->count())
                                                @foreach ($categories as $object)
                                                <option value="{{ $object->categoryName }}" name="category" class="form-control " >{{ $object->categoryName }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @error('category')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for=foodDescription">
                                                <h6>Description</h6>
                                            </label>
                                            <input type="text" name="foodDescription" class="form-control @error('foodDescription') is-invalid @enderror" >
                                            @error('foodDescription')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for=price">
                                                <h6>Price</h6>
                                            </label>
                                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" >
                                            @error('price')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for=placingNumberInSales">
                                                <h6>Number Placing in Sales</h6>
                                            </label>
                                            <input type="number" name="placingNumberInSales" class="form-control @error('placingNumberInSales') is-invalid @enderror" >
                                            @error('placingNumberInSales')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for=quantity">
                                                <h6>Quantity</h6>
                                            </label>
                                            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" >
                                            @error('quantity')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for=image_path">
                                                <h6>Upload Image</h6>
                                            </label>
                                            <input type="file" name="image_path" class="form-control @error('image_path') is-invalid @enderror" accept="image/*"> 
                                            @error('image_path')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group checkboxInline">
                                            <label for=dish_option">
                                                <h6>Option Available</h6>
                                            </label></br>
                                            <input type="checkbox" name="seafoodfree" value="1" >Seafood-Free 
                                            &#160<input type="checkbox" name="nutfree" value="1" >Nut-Free
                                            &#160<input type="checkbox" name="vegetarian" value="1" >Vegetarian-Friendly
                                            &#160<input type="checkbox" name="vegan" value="1" >Vegan-Friendly
                                        </div>
                                        <div class="card-footer"> 
                                            <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Submission </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- End -->
                                <!-- Add Beverage -->
                                <div id="addbeverage" class="tab-pane fade pt-3" >
                                    <form role="form" action="{{url('addBeverage')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group"> 
                                            <label for="foodName">
                                                <h6>Name</h6>
                                            </label>
                                            <input type="text" name="foodName" class="form-control @error('beverage_name') is-invalid @enderror"> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="beverage_category">
                                                <h6>Category</h6>
                                            </label>
                                            <select name="category" id="type" class="form-control">
                                                @if(!empty($categories) && $categories->count())
                                                @foreach ($categories as $object)
                                                <option value="{{ $object->categoryName }}" name="category" class="form-control @error('category') is-invalid @enderror">{{ $object->categoryName }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group"> 
                                            <label for="foodDescription">
                                                <h6>Description</h6>
                                            </label>
                                            <input type="text" name="foodDescription" class="form-control @error('foodDescription') is-invalid @enderror"> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="price">
                                                <h6>Price</h6>
                                            </label>
                                            <input type="text" name="price" pattern="^\d*(\.\d{0,2})?$" class="form-control @error('price') is-invalid @enderror"> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="placingNumberInSales">
                                                <h6>Number Placing in Sales</h6>
                                            </label>
                                            <input type="number" name="placingNumberInSales" class="form-control @error('placingNumberInSales') is-invalid @enderror"> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="quantity">
                                                <h6>Quantity</h6>
                                            </label>
                                            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="image_path">
                                                <h6>Upload Image</h6>
                                            </label>
                                            <input type="file" name="image_path" class="form-control @error('image_path') is-invalid @enderror" accept="image/*" > 
                                        </div>
                                        <div class="form-group checkboxInline">
                                            <label for=dish_option">
                                                <h6>Options</h6>
                                            </label></br>
                                            <input name="hotdrink" type="checkbox" value="1" >Hot Drink
                                            &#160<input type="checkbox" name="colddrink" value="1" >Cold Drink
                                        </div>
                                        <div class="card-footer"> 
                                            <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Submission </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- End -->

                                <!-- Add Category -->
                                <div id="addcategory" class="tab-pane fade pt-3" >
                                    <form role="form" action="{{url('addCategory')}}" method="post">
                                        @csrf
                                        <div class="form-group"> 
                                            <label for="categoryName">
                                                <h6>Category Name</h6>
                                            </label>
                                            <input type="text" name="categoryName" class="form-control @error('categoryName') is-invalid @enderror"> 
                                        </div>
                                        <div class="card-footer"> 
                                            <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Submission </button>
                                        </div>
                                    </form>
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
        <!--<script src="assets/js/script.js"></script>-->
        <script>
$(document).ready(function () {
    $('.beverage_price').mask('00000.00', {reverse: true});
});
        </script>
    </body>
</html>
@endsection