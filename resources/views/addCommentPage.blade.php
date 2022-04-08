@extends('layouts.Customer.master')
@section('content')

<style>
    .btn-primary {
        background-color: #E0B080;
    }
    .input-group{
        height: 200px;
    }

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</br></br></br>
<H1>Create New Comment</H1></br>

<form method="POST" action="{{action ('App\Http\Controllers\commentController@addInByID') }}">
Please select an account to procees:</br>
                            <input type="radio" id="1" name="account_id" value="1">
                            <label for="1">1</label><br>
                            <input type="radio" id="2" name="account_id" value="2">
                            <label for="2">2</label><br>  
                            <input type="radio" id="3" name="account_id" value="3">
                            <label for="3">3</label><br><br>
    @csrf
    Post ID : <input type="text" value='{{$postId}}' readonly>
    
    <?php
    $id = $postId;
    ?>

    <H4>Comments</H4></br>
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
            <input type="hidden" value="<?Php echo $id; ?>" name="id">   

        </div>
    </div></br>

    <button type="Submit" class="btn btn-primary btn-lg btn-block">Create Comment</button></br>

</form>


@endsection
