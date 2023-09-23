<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Post;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('comments')->get();

        return view('post/index', ['posts' => $posts]);
    }

    public function show(Post $post): View
    {
        return view('post/show', compact('post'));
    }

    public function create(): View
    {
        return view('post/create');
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $post = new Post();

        // リクエストオブジェクトからパラメータを取得
        $post->title = $request->title;
        $post->comment = $request->comment;
        $post->user_id = Auth::id();

        // 保存
        $post->save();

        return redirect(route('post.index'))
        ->with('message', $post->title . 'を追加しました。');
    }

    public function edit(Post $post): View
    {
        return view('post/edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $post->title = $request->title;
        $post->comment = $request->comment;

        $post->update();

        return redirect(route('post.index'))->with('message', $post->title . 'を変更しました。');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect(route('post.index'))->with('message', $post->title . 'を削除しました。');
    }
}
