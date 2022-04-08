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
            <a type="button" id="popup" href="{{url('editCategory')}}" class="btn btn-primary">Back</a>
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-6">Update Category</h1>
                </div>
            </div> <!-- End -->
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div class="card ">
                        <div class="card-header">
                            <!-- Update Form -->
                            <div class="tab-content">
                                <div id="add-beverage" class="tab-pane fade show active pt-3">
                                    @if(!empty($editCategory) && $editCategory->count())
                                    @foreach($editCategory as $category)
                                    <form role="form" action="{{url('updateCategory/'. $category->id)}}" method="post">
                                        @csrf
                                        <!--<input type="hidden" name="id" class="form-control" value="{{$category->id}}" required>-->
                                        <div class="form-group"> 
                                            <label for="category_name">
                                                <h6>Name</h6>
                                            </label>
                                            <input type="text" name="categoryName" class="form-control @error('categoryName') is-invalid @enderror" value="{{$category->categoryName}}"> 
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