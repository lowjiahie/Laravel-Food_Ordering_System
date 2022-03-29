@extends('layouts.Customer.master')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .btn-primary {
        background-color: #E0B080;
    }
    .input-group{
        height: 200px;
    }

</style>
</br></br></br>
<H1>Create New Post</H1></br>
<H4>Topic</H4>
<form method="POST" action="{{url('myPost')}}">
    @csrf
    <div class="d-flex justify-content-center">

        <div class="input-group input-group-lg">
            <input type="text" class="form-control @error('topic') is-invalid @enderror" value="{{ old('topic') }}" 
                   aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="topic"
                   placeholder="Eg.Recommended Food">
             {{-- Show input error --}}
            @error('topic')
            <span class="invalid-feedback" role="alert">
                <div>{{ $message }}</div>
            </span>
            @enderror
        </div></br>
    </div>
    <H4>Description</H4>
    <div class="d-flex justify-content-center">

        <div class="input-group input-group-lg">
            <input type="text" class="form-control @error('desc') is-invalid @enderror"  value="{{ old('desc') }}"
                   aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="desc"
                   placeholder="Eg.I like....">
            {{-- Show input error --}}
            @error('desc')
            <span class="invalid-feedback" role="alert">
                <div>{{ $message }}</div>
            </span>
            @enderror
        </div>
    </div></br>
    <button type="Submit" class="btn btn-primary btn-lg btn-block">Create Post</button></br>
</form>
@endsection


