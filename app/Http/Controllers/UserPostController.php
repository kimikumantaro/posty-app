<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        // dd($user->receivedLikes());

        $posts = $user->posts()->with(['user', 'likes'])->paginate(4);
        return view('users.posts.index', [
            'posts' => $posts,
            'user' => $user,
        ]);
    }
}
