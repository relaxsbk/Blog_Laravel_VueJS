<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\PostStoreRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function Termwind\render;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('MyPosts', []);
    }

    public function store(PostStoreRequest $request)
    {
        auth()->user()->posts()->create($request->validated());

        return to_route('myPosts');
    }
}
