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
                <h1 class="display-6">Beverage Management</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#add-beverage" class="nav-link active "> <i class="fas fa-plus-circle"></i>&#160 Create </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#update-delete-beverage" class="nav-link "> <i class="fas fa-folder"></i>&#160 Update / Delete</a> </li>
                            </ul>
                        </div> 
                        <!-- End -->
                        <!-- Add Beverage form content -->
                        <div class="tab-content">
                        <!-- Add Beverage -->
                            <div id="add-beverage" class="tab-pane fade show active pt-3">
                                <form role="form">
                                    <div class="form-group"> 
                                        <label for="beverage_name">
                                            <h6>Name</h6>
                                        </label>
                                        <input type="text" name="beverage_name" required class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for="beverage_name">
                                            <h6>Name</h6>
                                        </label>
                                        <input type="text" name="beverage_name" required class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for="beverage_description">
                                            <h6>Description</h6>
                                        </label>
                                        <input type="text" name="beverage_description" required class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for="beverage_price">
                                            <h6>Price</h6>
                                        </label>
                                        <input type="text" name="beverage_price" required class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for="beverage_ranking">
                                            <h6>Number Placing in Sales</h6>
                                        </label>
                                        <input type="number" name="beverage_ranking" required class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for="beverage_quantity">
                                            <h6>Quantity</h6>
                                        </label>
                                        <input type="number" name="beverage_quantity" required class="form-control " required> 
                                    </div>
                                    <div class="form-group"> 
                                        <label for="beverage_image">
                                            <h6>Upload Image</h6>
                                        </label>
                                        <input type="text" name="beverage_image" required class="form-control " required> 
                                    </div>
                                    <div class="form-group checkboxInline">
                                        <label for=dish_option">
                                            <h6>Options</h6>
                                        </label></br>
                                        <input type="checkbox">Hot Drink
                                         &#160<input type="checkbox">Cold Drink
                                         &#160<input type="checkbox">Caffeinated
                                    </div>
                                    <div class="card-footer"> 
                                        <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> Submission </button>
                                    </div>
                                </form>
                            </div>        
                            <!-- End -->
                            <!-- Update and Delete Beverage -->
                            <div id="update-delete-beverage" class="tab-pane fade pt-3" style=".container {
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
                                                @if(!empty($beverages) && $beverages->count())
                                                    @foreach($beverages as $value)
                                                        <tr>
                                                            <td>{{ $value-> placingNumberInSales }}</td>
                                                            <td>{{ $value-> id }}</td>
                                                            <td>{{ $value-> foodName }}</td>
                                                            <td>{{ $value-> category }}</td>
                                                            <td>
                                                                <a type="button" id="popup" href="{{url('beverageManagement/'. $value->id)}}" class="btn btn-success""><i class="fas fa-edit"></i></a>
                                                                <a type="button" id="popup" class="btn btn-danger" href="{{url('beverageManagement/'. $value->id)}}"><i class="far fa-trash-alt"></i></a>
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
                                      </div>
                                    </div>
                                </div>
                            </div>
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