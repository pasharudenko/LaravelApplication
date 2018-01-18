@extends('layouts.admin')

@section('content')
    <h1>Comments</h1>
    <table class="table-bordered table">
        <thead>
        <tr>
            <th>Author</th>
            <th>Body</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($replies as $reply)
            <tr>
                <td>{{$reply->user->name}}</td>
                <td>{{$reply->body}}</td>
                <td>
                    @if($reply->is_active == 0)
                        {!! Form::open(['method' => 'PUT', 'action' => ['ReplyController@update', $reply->id]]) !!}
                        <input type="hidden" value="1" name="is_active">
                        <button type="submit" class="btn btn-success">Approve</button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['method' => 'PUT', 'action' => ['ReplyController@update', $reply->id]]) !!}
                        <input type="hidden" value="0" name="is_active">
                        <button type="submit" class="btn btn-danger">Un-Approve</button>
                        {!! Form::close() !!}
                    @endif
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['ReplyController@destroy', $reply->id]]) !!}
                    <button type="submit" class="btn btn-danger">DELETE</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection