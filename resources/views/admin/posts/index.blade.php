@extends('layouts.admin')

@section('content')
    <h1>All Posts</h1>
    @if(count($posts)>0)
    <table  class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Author</th>
            <th></th>
            <th>Created</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td><a href="/post/{{$post->id}}">{{$post->title}}</a></td>
                <td>{{$post->category->category}}</td>
                <td>{{$post->user->name}}</td>
                <td><a href="comments/{{$post->id}}">Comments</a></td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td><a href="posts/{{$post->id}}/edit" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
                    <button type="submit" class="btn btn-danger">Delete</button>
                    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach
        </tbody>
        @else
            <h5>No posts!</h5>
        @endif
    </table>
@endsection