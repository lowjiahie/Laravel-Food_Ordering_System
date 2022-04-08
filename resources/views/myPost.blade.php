@extends('layouts.Customer.master')
@section('content')
<title>Forum</title>

</br></br>

<h3 class="text-center mb-5">My Post </h3>
<form action="myPost">  Please select an account to procees:</br>
                            <input type="radio" id="1" name="account_id" value="1">
                            <label for="1">1</label><br>
                            <input type="radio" id="2" name="account_id" value="2">
                            <label for="2">2</label><br>  
                            <input type="radio" id="3" name="account_id" value="3">
                            <label for="3">3</label><br><br><input type="submit" ></form>

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
@foreach($post as $posts)
@php
$accName= App\Models\Account::where('id', '=', $posts->account_id)->first();
@endphp

<table width="100%">
    <tr>
        <td> {{$accName->accountName}}</td>
        <td><b>Created at: </b> {{$posts['created_at']}}<b> Updated at: </b>{{$posts['updated_at']}}</td>
    <tr>
        <td></td>
        <td>Topic : {{$posts['topic']}}</td>
    </tr>
    <tr>
        <td></td>
        <td>Description: {{$posts['post_desc']}}</td>
        <td> <div align="right"> <a href="{{ action('App\Http\Controllers\myPostController@edit', $posts['id']) }}" class="btn btn-warning" >Edit</a></div>
            <form action="{{action('App\Http\Controllers\myPostController@destroy', $posts['id'])}}" method="post" align="right">
                @csrf
                <input name="_method" type="hidden" value="DELETE" align="right">
                <button class="btn btn-danger" type="submit">Delete</button>
            </form></td>
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