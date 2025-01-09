<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\PostStoreRequest;
use App\Http\Requests\Posts\PostUpdateRequest;
use App\Models\Posts;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function Termwind\render;

class PostController extends Controller
{
    public function dashboard()
    {
        $posts = Posts::all();

        return Inertia::render('Dashboard', ['posts' => $posts]);
    }

    public function index()
    {
        $posts = auth()->user()->posts()
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();



        return Inertia::render('MyPosts', ['posts' => $posts]);
    }

    public function store(PostStoreRequest $request)
    {
        auth()->user()->posts()->create($request->validated());

        return to_route('myPosts');
    }

    public function update(PostUpdateRequest $request, $post)
    {
        $post = Posts::query()->findOrFail($post);

        $post->update($request->validated());

        return to_route('myPosts');
    }

    public function destroy($post)
    {
        Posts::destroy($post);

        return to_route('myPosts');
    }
}
