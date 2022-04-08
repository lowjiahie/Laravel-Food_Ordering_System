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
            <a type="button" id="popup" href="{{url('editDish')}}" class="btn btn-primary">Back</a>
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-6">Update Dish</h1>
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div class="card ">
                        <div class="card-header">
                            <!-- Update Form -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active pt-3">
                                    @if(!empty($editDish) && $editDish->count())
                                    @foreach($editDish as $dish)
                                    <form role="form" action="{{url('updateDish/'. $dish->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="dish_foodable_id" class="form-control" value="{{$dish->foodable_id}}"> 
                                        <div class="form-group"> 
                                            <label for="foodName">
                                                <h6>Name</h6>
                                            </label>
                                            <input type="text" name="foodName" class="form-control @error('foodName') is-invalid @enderror" value="{{$dish->foodName}}">
                                            @error('foodName')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for="dish_category">
                                                <h6>Category</h6>
                                            </label>
                                            <select name="category" id="type" class="form-control @error('category') is-invalid @enderror">
                                                @if(!empty($categories) && $categories->count())
                                                @foreach ($categories as $object)
                                                <option value="{{ $object->categoryName }}" name="category" class="form-control ">{{$object->categoryName }}</option>
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
                                            <label for="foodDescription">
                                                <h6>Description</h6>
                                            </label>
                                            <input type="text" name="foodDescription" class="form-control @error('foodDescription') is-invalid @enderror" value="{{$dish->foodDescription}}"> 
                                            @error('foodDescription')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for="price">
                                                <h6>Price</h6>
                                            </label>
                                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$dish->price}}"> 
                                            @error('price')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for="placingNumberInSales">
                                                <h6>Number Placing in Sales</h6>
                                            </label>
                                            <input type="number" name="placingNumberInSales" class="form-control @error('placingNumberInSales') is-invalid @enderror" value="{{$dish->placingNumberInSales}}"> 
                                            @error('placingNumberInSales')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group"> 
                                            <label for="quantity">
                                                <h6>Quantity</h6>
                                            </label>
                                            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{$dish->quantity}}"> 
                                            @error('quantity')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group checkboxInline">
                                            <label for=dish_option">
                                                <h6>Options</h6>
                                            </label></br>
                                            <input name="dish_seafoodfree" type="checkbox" value="1"
                                                   @if($dish->seafoodFree == 1) checked=checked @endif>Seafood-Free
                                            &#160<input name="dish_nutfree" type="checkbox" value="1"
                                                        @if($dish->nutFree == 1) checked=checked @endif>Nut-Free
                                            &#160<input name="dish_veganfriendly" type="checkbox" value="1"
                                                        @if($dish->veganFriendly == 1) checked=checked @endif>Vegan-Friendly
                                            &#160<input name="dish_vegetarianfriendly" type="checkbox" value="1"
                                                        @if($dish->vegetarianFriendly == 1) checked=checked @endif>Vegetarian-Friendly
                                        </div>
                                        <div class="card-footer"> 
                                            <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Submission </button>
                                        </div>
                                    </form>
                                    <hr>
                                    <form role="form" action="{{url('updateDishImage/'. $dish->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group"> 
                                            <label for="image_path">
                                                <h5>Update Image</h5>
                                                <div> 
                                                    Current Picture : {{$dish->image_path}} 
                                                </div></br>
                                                <div>
                                                    Replace Picture Here : <input type=file name="image_path" value="{{$dish->image_path}}"> 
                                                </div>
                                            </label>
                                            @error('image_path')
                                            <span class="invalid-feedback" role="alert" style="display:block !important">
                                                <div>{{ $message }}</div>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="card-footer"> 
                                            <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Submission </button>
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