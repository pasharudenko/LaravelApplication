@extends('layouts.admin')
@section('script')
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
@endsection
@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store' , 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Post Name:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    @foreach($errors->get('title') as $error)
        <div class="alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::label('photo', 'Post Photo:') !!}
        {!! Form::file('photo_id',  ['class' => 'form-control']) !!}
    </div>
    @foreach($errors->get('photo_id') as $error)
        <div class="alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::label('categories', 'Categories:') !!}
        {!! Form::select('category_id', ['' => 'Choose the option'] + $categories, null, ['class' => 'form-control']) !!}
    </div>
    @foreach($errors->get('category_id') as $error)
        <div class="alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
    @foreach($errors->get('body') as $error)
        <div class="alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

    <script>
        CKEDITOR.replace( 'body' );
    </script>
@endsection

