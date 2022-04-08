@extends('layouts.Customer.master')
@section('content')
<title>View Comment</title>
<style>

</style>

</br></br></br></br>
<a href="{{url('viewxmlReplies') }}" >Views Replies</a>

@foreach($comment as $comments)

<table align='center' width='80%'>
    <tr>
        <td><b>Created at: </b> {{$comments['commentCreated']}}<b> Updated at: </b>{{$comments['commentUpdated']}}</td>
        
    </tr>
    <tr>
        <td>Comments by: {{$comments['commentAccName']}}</td>
    </tr>
    <tr>
        <td>Comments: {{$comments['comment_desc']}}</td>
    </tr>
</table>
</br></br></br>

@endforeach
        


@endsection