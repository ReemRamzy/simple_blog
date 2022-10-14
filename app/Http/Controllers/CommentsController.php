<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;

class CommentsController extends Controller
{
    public function store(Post $post , User $user) {

        comment::create([
            'body' => request('body'),
            'user_id' => $user->id,
            'post_id' => $post->id

        ]);
        return back();
    }
}
