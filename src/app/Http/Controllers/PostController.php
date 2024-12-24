<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json([
            "status" => true,
            "message" => "投稿を作成しました",
            "data" => $post
        ], 201);
    }

    public function show(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                "status" => false,
                "message" => "投稿が見つかりません",
            ], 404);
        }
        return response()->json($post);
    }

    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                "status" => false,
                "message" => "投稿が見つかりません",
            ], 404);
        }
        $post->update($request->all());
        return response()->json([
            "status" => true,
            "message" => "投稿を更新しました",
            "data" => $post
        ], 200);
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                "status" => false,
                "message" => "投稿が見つかりません",
            ], 404);
        }
        $post->delete();
        return response()->json([
            "status" => true,
            "message" => "投稿を削除しました",
        ], 200);
    }
}
