<?php

namespace App\Http\Controllers\Personal\Likes;

use App\Http\Controllers\Controller;
use App\Models\Post;


class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {

        auth()->user()->likesPosts()->detach($post->id);
        return redirect()->route('personal.likes.index');
    }
}
