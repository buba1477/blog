<?php

namespace App\Http\Controllers\Personal\Likes;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likesPosts;

        return view('personal.likes.index', compact('posts'));
    }
}
