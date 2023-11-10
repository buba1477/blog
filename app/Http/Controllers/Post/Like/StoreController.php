<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;

use App\Http\Requests\User\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;


class StoreController extends Controller

{
    public function __invoke(Post $post)
    {

         auth()->user()->likesPosts()->toggle($post->id);


        return redirect()->back();
    }
}
