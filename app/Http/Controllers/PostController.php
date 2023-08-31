<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('user')->paginate(10);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'unique:post,title'],
            'body' => ['required'],
        ]);

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . Str::random(10),
            'body' => $request->body,
        ]);
        return response()->json([
            "message" => "success create post",
        ], 200);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required','unique:post,title,' . $post->id],
            'body' => ['required'],
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return response()->json([
            "message" => "success update post",
        ], 200);
    }

    public function destroy(Post $post){
        $post->delete();
        return response()->json([
            "message" => "success destroy post",
        ], 200);
    }
}
