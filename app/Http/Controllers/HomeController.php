<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\MiniPostResource;
use App\Models\Posts;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Posts::all();

//        $p = new MiniPostResource($posts);

        $posts = MiniPostResource::collection($posts);


        return Inertia::render('Home', ['posts' => $posts]);
    }
}
