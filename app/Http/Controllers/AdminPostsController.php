<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPostsController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::pluck('category','id')->all();
        return view('admin.posts.create',  compact('categories'));
    }


    public function store(CreatePostRequest $request)
    {
        $input = $request->all();
        $user = Auth::user()->id;
        if($file = $request->file('photo_id'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['photo' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $input['user_id'] = $user;
        Post::create($input);
        return redirect('/admin/posts');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('category', 'id')->all();
        return view('admin.posts.update', compact('post', 'categories'));
    }


    public function update(CreatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path().'/images/'.$post->photo->photo);
        Photo::where('photo', $post->photo->photo)->delete();
        $input = $request->all();
        if($file = $request->file('photo_id'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['photo' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $post->update($input);
        return redirect('admin/posts');
    }


    public function destroy($id)
    {
       $post = Post::findOrFail($id);
       unlink(public_path().'/images/'.$post->photo->photo);
       Photo::where('photo', $post->photo->photo)->delete();
       $post->delete();
       return redirect()->back();
    }
}
