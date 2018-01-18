@extends('layouts.admin')
@section('content')
    <h1 class="text-center">All Users</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Role</th>
            <th>Active</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            @if($user->photo_id == NULL)
                <td><img src="{{asset('images/noImage.jpg')}}" alt="" width="70" height="60"></td>
                @else
                <td><img src="/images/{{$user->photo->photo}}" width="70" height="60"></td>
            @endif
            <td>{{$user->name}}</td>
            <td>{{$user->role->name}}</td>
            @if($user->is_active == 0)
                <td>Not active</td>
                 @else
                <td>Active</td>
            @endif
            <td>{{$user->email}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection