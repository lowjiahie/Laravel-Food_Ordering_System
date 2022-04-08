@extends('layouts.Customer.master')
@section('content')
<title>Searched Results</title>
<style>

</style>
</br></br>

                    <h3 class="text-center mb-5">Searched Results </h3>
                    
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
                            <div class="media"> <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="https://i.imgur.com/stD0Q19.jpg" />
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-8 d-flex">
                                            <h5>{{$posts['id']}}</h5> <span><b>Created at: </b> {{$posts['created_at']}}<b> Updated at: </b>{{$posts['updated_at']}}</span>
                                        </div>
                                        <div class="col-4">
                                            <div class="pull-right reply"> <form action="comment" align="right"><i class="fa fa-reply"><span> <input type="submit" border="0" value="Reply"></span></i></form></div>
                                        </div>
                                    </div><b>Topic : {{$posts['topic']}}</b></br></br>{{$posts['post_desc']}}
                                    <div align="right"> <a href="{{ action('App\Http\Controllers\forumController@edit', $posts['id']) }}" class="btn btn-warning" >Edit</a></div>
                                    <form action="{{action('App\Http\Controllers\forumController@destroy', $posts['id'])}}" method="post" align="right">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE" align="right">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                    <div class="media mt-4"> <a class="pr-3" href="#"><img class="rounded-circle" alt="Bootstrap Media Another Preview" src="https://i.imgur.com/xELPaag.jpg" /></a>     
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-12 d-flex">
                                                    <h5></h5> <span><b>Reply On: </b>{{$posts['created_at']}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

@endsection
