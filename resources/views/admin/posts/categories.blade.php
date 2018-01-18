@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
            <div class="form-group">
                {!! Form::label('category', 'Category:') !!}
                {!! Form::text('category', null, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">
            <h1>Categories list</h1>
            @foreach($categories as $category)
                <ul>
                    <li>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
                        {{$category->category}}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection