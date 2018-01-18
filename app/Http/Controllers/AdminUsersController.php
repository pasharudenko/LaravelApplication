<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $role = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('role'));
    }

    public function store(CreateUserRequest $request)
    {
        $input = $request->except('passwordConfirmation');
        if($file = $request->file('photo_id'))
        {
           $name = time().$file->getClientOriginalName();
           $file->move('images',$name);
           $photo = Photo::create(['photo' => $name]);
           $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect('admin/users');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
