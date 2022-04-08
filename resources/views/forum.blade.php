@extends('layouts.Customer.master')
@section('content')
<title>Forum</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap');
    @import url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    @import url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js');
    body {
        height: 100%
    }

    body {
        display: grid;
        place-items: center;
        font-family: 'Source Sans Pro', sans-serif;
        background: white;
    }

    .card {
        position: relative;
        display: flex;
        padding: 20px;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #d2d2dc;
        border-radius: 11px;
        -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
        -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
        box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
    }

    .media img {
        width: 60px;
        height: 60px
    }

    .reply a {
        text-decoration: none
    }
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin2/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
</style>
</br></br>
<input type="">
<div class="container uper">
    <div class="container mb-5 mt-5">
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center mb-5"> Forum </h3>
                    <div class="row">
                        <div class="col-md-12">

                            <form action="{{action('App\Http\Controllers\myPostController@searchByTopic')}}" method="POST" role="search">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="searchInput"
                                           placeholder="Search"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default" value="Search">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>                             
                            <form action="addNewPost" align="right"><input type="submit" class="btn btn-success" value="Add A New Post"></input></form>
                            Please select an account to procees:</br>
                            <input type="radio" id="1" name="account_id" value="1">
                            <label for="1">1</label><br>
                            <input type="radio" id="2" name="account_id" value="2">
                            <label for="2">2</label><br>  
                            <input type="radio" id="3" name="account_id" value="3">
                            <label for="3">3</label><br><br>
                            @foreach($post as $posts)
                            @php
                            $accName= App\Models\Account::where('id', '=', $posts->account_id)->first();
                            @endphp
                          
                            <table>
                                <tr>
                                    <td> {{$accName->accountName}}</td>
                                    <td><b>Created at: </b> {{$posts['created_at']}}<b> Updated at: </b>{{$posts['updated_at']}}</td>
                                    <td><form action="{{action('App\Http\Controllers\commentController@viewByPostID') }}" method="POST">@csrf<input type="hidden" name="id" value="{{$posts['id']}}"><button type="submit" class="btn btn-success">Add Comment</button></form>
                                    <td><form action="{{action('App\Http\Controllers\forumController@viewCommentByID')}}" method="POST" >@csrf <button type="submit" class="btn btn-success"  name="id" value="{{  $posts['id']}}">View Comments</button></form></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Topic : {{$posts['topic']}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Description: {{$posts['post_desc']}}</td>
                                </tr>
                            </table>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
