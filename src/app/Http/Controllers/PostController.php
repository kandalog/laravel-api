<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return $this->success($post, "投稿を作成しました", 201);
    }

    public function show(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->notFound("投稿が見つかりません");
        }
        return response()->json($post);
    }

    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->notFound("投稿が見つかりません");
        }

        $post->update($request->all());
        return $this->success($post, "投稿を更新しました", 200);
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return $this->notFound("投稿が見つかりません");
        }

        $post->delete();
        return $this->success(null, "投稿を削除しました", 200);
    }
}
