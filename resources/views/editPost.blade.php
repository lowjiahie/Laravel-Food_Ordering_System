@extends('layouts.Customer.master')
@section('content')
<head>
    <meta charset="utf-8">
    <title>Edit Product Details</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
</br></br>

<h2>Edit Post Details</h2>
<form method="POST" action="{{action('App\Http\Controllers\myPostController@update', $id)}}">
    <input name="_method" type="hidden" value="PATCH">
    @csrf
    <label for="code">Post Topic:</label>
    <div class="d-flex justify-content-center">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control @error('topic') is-invalid @enderror" 
                   aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="topic"
                   value="{{$post->topic}}">
            {{-- Show input error --}}
            @error('topic')
            <span class="invalid-feedback" role="alert">
                <div>{{ $message }}</div>
            </span>
            @enderror
        </div></br>
    </div>
    <label for="code">Post Description:</label>
    <div class="d-flex justify-content-center">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control @error('desc') is-invalid @enderror"   value="{{$post->post_desc}}"
                   aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="desc"
                   placeholder="Eg.I like....">
            {{-- Show input error --}}
            @error('desc')
            <span class="invalid-feedback" role="alert">
                <div>{{ $message }}</div>
            </span>
        </div>
        @enderror
    </div>
    <button type="Submit" class="btn btn-primary btn-lg btn-block">Update Post</button></br>
</form>
@endsection