@extends('layouts.Staff.master')

@section('content')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Category Management</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="../../../css/foodManagement.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-6">Category Management</h1>
                </div>
            </div> <!-- End -->
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div class="card ">
                        <div class="card-header">
                            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                <div class="tab-content">
                                    <div id="update-delete-beverage" class="tab-pane fade show active pt-3" style=".container {
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
                                                                <th scope="col">id</th>
                                                                <th scope="col">category available</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!empty($categories) && $categories->count())
                                                            @foreach($categories as $value)
                                                            <tr>
                                                                <td>{{ $value-> id }}</td>
                                                                <td>{{ $value-> categoryName }}</td>
                                                                <td>
                                                                    <a type="button" id="popup" href="{{url('categoryEditForm/'. $value->id)}}" class="btn btn-success""><i class="fas fa-edit"></i></a>
                                                                    <a type="button" id="popup" class="btn btn-danger" href="editCategory/destroy/{{$value->id}}"><i class="far fa-trash-alt"></i></a>
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