<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class LikeController extends Controller
{
    public function store(Post $post): RedirectResponse
    {
        Auth::user()->like($post->id);
        return redirect(route('post.index'))->with('message', $post->title . 'をいいねしました。');
    }

    public function destroy(Post $post): RedirectResponse
    {
        Auth::user()->unlike($post->id);
        return redirect(route('post.index'))->with('message', $post->title . 'のいいねを取消しました。');
    }
}
