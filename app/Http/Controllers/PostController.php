<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        // $posts = Post::get(); // return all post in natural db order (Laravel Collection Library)

        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20); //with, eager loading in, data between user and likes to the realtionships before start iterating through them, less sql query
        // dd($posts->likes);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post)
    {
        // dd($post);
        $this->authorize('delete', $post); //Laravel native authorization, authorize() method, using policy for deletion
        $post->delete();

        return back();
    }
}
