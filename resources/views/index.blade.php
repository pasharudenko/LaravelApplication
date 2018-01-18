@extends('layouts.app')

@section('content')
    <div class="ml-5">
<h1 class="text-center m-5">All Posts</h1>
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card mb-4 bg-faded" style="width:57rem">
                <div class="row">
                    <div class="col-md-6"><img class="card-img-top" src="{{asset('images')}}/{{$post->photo->photo}}" alt="Card image cap" width="400" height="300"></div>
                    <div class="col-md-6">
                        <h3>{{$post->title}}</h3>
                        <p class="">{!! str_limit($post->body, 250)!!}</p>
                        <a href="/post/{{$post->id}}" class="btn btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-4 ">
            <div class="card">
                <div class="card-header">
                    <h4>Blog Search</h4>
                    {!! Form::open(['method' => 'GET', 'action' => 'IndexAboutContactsController@search']) !!}
                    <div class="input-group">
                        <input type="text" placeholder="Search for..." class="form-control" name="search">
                        <span class="input-group-btn">
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <div class="text-center">
                        <h4>Blog Categories</h4>
                        <ul class="list-unstyled">
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach($categories as $category)
                                        {!! Form::open(['method' => 'GET', 'action' => ['IndexAboutContactsController@categories', $category]]) !!}
                                        <li><a href="/categories/{{$category->id}}">{{$category->category}}</a></li>
                                        {!! Form::close() !!}
                                    @endforeach
                                </div>
                            </div>
                    </div>
                    </ul>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Site Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur eius illum nesciunt quia recusandae rem similique? Accusamus ad, alias, architecto delectus dolores ea, eligendi hic magni maxime omnis porro provident quam quisquam quod soluta sunt voluptates? Autem consectetur cupiditate, ducimus labore laboriosam nesciunt qui, quod, recusandae sint soluta tenetur voluptate.</p>
                </div>
            </div>
        </div>
    </div>
        <nav>
            <ul class="pagination justify-content-center">
               <!-- <li class="page-item"><a href="{{$posts->url($posts->previousPageUrl()) }}" class="page-link">Previous</a></li>
                <li class="page-item"><a href="{{$posts->url($posts->perPage())}}" class="page-link">Next</a></li> -->
                {{$posts->render()}}

            </ul>
        </nav>
    </div>
@endsection
