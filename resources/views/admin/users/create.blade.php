@extends('layouts.admin')
@section('content')
    <h1 class="text-center">Create User Page</h1>
    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    @foreach($errors->get('name') as $error)
        <div class="alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::label('photo', 'Photo:') !!}
        {!! Form::file('photo_id', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
    @foreach($errors->get('email') as $error)
        <div class="alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::label('role', 'Role:') !!}
        {!! Form::select('role_id', ['' => 'Choose the role'] + $role, null, ['class' => 'form-control']) !!}
    </div>
    @foreach($errors->get('role_id') as $error)
        <div class="alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::label('is_active', 'Active:') !!}
        {!! Form::select('is_active', array('0' => 'Not Active', '1' => 'Active'), null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password',  ['class' => 'form-control']) !!}
    </div>
    @foreach($errors->get('password') as $error)
        <div class="alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::label('passwordConfirmation', 'Confirm Password:') !!}
        {!! Form::password('password_confirmation',  ['class' => 'form-control']) !!}
    </div>
    @foreach($errors->get('password_confirmation') as $error)
        <div class="alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}
@endsection