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
                <h1 class="display-6">Dish Management</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#update-deletedish" class="nav-link  active "> <i class="fas fa-folder"></i>&#160 Update / Delete</a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#adddish" class="nav-link"> <i class="fas fa-plus-circle"></i>&#160 Create </a> </li>
                            </ul>
                        </div> 
                        <!-- End -->
                        <!-- Add Dish form content -->
                        <div class="tab-content">
                            <!-- Update -->
                            <div id="update-deletedish" class="tab-pane fade show active pt-3" style=".container {
                                padding: 2rem 0rem;
                              }

                              h4 {
                                margin: 2rem 0rem 1rem;
                              }

                              .table-image {
                                td, th {
                                  vertical-align: middle;
                                }
                              }">
                                <div class="container">
                                    <div class="row">
                                      <div class="col-12">
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <th scope="col">Ranking</th>
                                              <th scope="col">ID</th>
                                              <th scope="col">Name</th>
                                              <th scope="col">Category</th>
                                              <th scope="col">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($dishes) && $dishes->count())
                                                    @foreach($dishes as $value)
                                                        <tr>
                                                          <td>{{ $value-> placingNumberInSales }}</td>
                                                          <td>{{ $value-> id }}</td>
                                                          <td>{{ $value-> foodName }}</td>
                                                          <td>{{ $value-> category }}</td>
                                                          <td>
                                                            <a type="button" id="popup" href="{{url('dishManagement/'. $value->id)}}" class="btn btn-success""><i class="fas fa-edit"></i></a>
                                                            <a type="button" id="popup" class="btn btn-danger" onclick="" href="{{url('dishManagement/destroy/'. $value->id)}}"><i class="far fa-trash-alt"></i></a>
                                                          </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="10">There are no data.</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        {!! $dishes->links() !!}
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Dish -->
                            <div id="adddish" class="tab-pane fade pt-3">
                                <form role="form">
                                    <div class="form-group"> 
                                        <label for=dish_name">
                                            <h6>Name</h6>
                                        </label>
                                        <input type="text" name=dish_name" class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for=dish_category">
                                            <h6>Category</h6>
                                        </label>
                                        <input type="text" name=dish_category" class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for=dish_description">
                                            <h6>Description</h6>
                                        </label>
                                        <input type="text" name=dish_description" class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for=dish_price">
                                            <h6>Price</h6>
                                        </label>
                                        <input type="text" name=dish_price" class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for=dish_ranking">
                                            <h6>Number Placing in Sales</h6>
                                        </label>
                                        <input type="number" name=dish_ranking" class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for=dish_quantity">
                                            <h6>Quantity</h6>
                                        </label>
                                        <input type="number" name=dish_quantity" class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for=dish_image">
                                            <h6>Upload Image</h6>
                                        </label>
                                        <input type="file" id="dish_image" class="form-control" accept="image/*" class="form-control" required> 
                                    </div>
                                    <div class="form-group checkboxInline">
                                        <label for=dish_option">
                                            <h6>Option Available</h6>
                                        </label></br>
                                        <input name="optionsDish[]" type="checkbox" value=1 >Seafood-Free 
                                         &#160<input type="checkbox" name="optionsDish[]" value=1 >Nut-Free
                                         &#160<input type="checkbox" name="optionsDish[]" value=1 >Vegetarian-Friendly
                                         &#160<input type="checkbox" name="optionsDish[]" value=1 >Vegan-Friendly
                                    </div>
                                    <div class="card-footer"> 
                                        <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> Submission </button>
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
<!--    <script type="text/javascript">
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(function confirmation(foodName) {
            confirm("Are you sure to DELETE " + foodName + " ?");
        });
    </script>-->
</body>
</html>
@endsection