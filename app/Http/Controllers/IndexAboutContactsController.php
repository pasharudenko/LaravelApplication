<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TijsVerkoyen\CssToInlineStyles\Css\Processor;

class IndexAboutContactsController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(2);
        return view('index', compact('posts', 'categories'));
    }
    public function search()
    {
        $categories = Category::all();
        $posts = Post::where('title', 'LIKE', '%'.$_GET['search'].'%')->paginate(2);
        return view('index', compact('posts', 'categories'));
    }
    public function categories($id)
    {
        $categories = Category::all();
        $posts = Post::where('category_id', $id)->paginate(2);

        return view('index', compact('posts', 'categories'));
    }
    public function storeComment(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        Comment::create($input);
        $request->session()->flash('comment_message', 'Your message has been submitted and is waiting moderation');
        return redirect()->back();
    }
    public function storeReply(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        Reply::create($input);
        $request->session()->flash('reply_message', 'Your reply has been submitted and is waiting moderation');
        return redirect()->back();
    }
    public function post($id)
    {
        $post = Post::findOrFail($id);

         $categories = Category::all();
         $comments = Comment::where('post_id', $id)->get();
         $replies = Reply::all();
        return view('certainPost', compact('post', 'categories', 'comments', 'replies'));
    }
    public function about()
    {
        return view('about');
    }

    public function contacts()
    {
        return view('contacts');
    }
}
