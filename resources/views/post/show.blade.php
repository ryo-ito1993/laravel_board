<x-layouts.laravel-board>
    <x-slot:title>
        投稿詳細
    </x-slot:title>
    <h1>投稿詳細</h1>
    <ul>
        <li>ID：{{ $post->id }}</li>
        <li>タイトル：{{ $post->title }}</li>
        <li>内容：{{ $post->comment }}</li>
    </ul>
    <a href="{{ route('post.index') }}">戻る</a>
</x-layouts.laravel-board>
