@extends('layouts.admin')

@section('content')
<h1>Comments</h1>
    <table class="table-bordered table">
        <thead>
        <tr>
            <th>Author</th>
            <th>Body</th>
            <th>Replies</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
        <tr>
            <td>{{$comment->user->name}}</td>
            <td>{{$comment->body}}</td>
            <td><a href="replies/{{$comment->id}}">Replies</a></td>
            <td>
                @if($comment->is_active == 0)
                    {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                    <input type="hidden" value="1" name="is_active">
                    <button type="submit" class="btn btn-success">Approve</button>
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                    <input type="hidden" value="0" name="is_active">
                    <button type="submit" class="btn btn-danger">Un-Approve</button>
                    {!! Form::close() !!}
                @endif
            </td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}
                <button type="submit" class="btn btn-danger">DELETE</button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection