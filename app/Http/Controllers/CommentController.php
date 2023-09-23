<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;


class CommentController extends Controller
{
    public function create(Post $post): View
    {
        return view('comment/create', compact('post'));
    }

    public function store(Request $request, Post $post): RedirectResponse
    {
        $comment = new Comment();

        // リクエストオブジェクトからパラメータを取得
        $comment->comment = $request->comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        // 保存
        $comment->save();

        return redirect(route('post.index'))
        ->with('message', $comment->comment . 'をコメントしました。');
    }

    public function edit(Comment $comment): View
    {
        return view('comment.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $comment->comment = $request->comment;
        $comment->save();

        return redirect(route('post.index'))->with('message', 'コメントが更新されました。');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect(route('post.index'))->with('message', 'コメントが削除されました。');
    }


}
