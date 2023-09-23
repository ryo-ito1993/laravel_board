<x-layouts.laravel-board>
    <x-slot:title>
        投稿一覧
    </x-slot:title>
    <h1>投稿一覧</h1>
    @if (session('message'))
        <x-alert class="info">
            {{ session('message') }}
        </x-alert>
    @endif
    <a href="{{ route('post.create') }}">追加</a>
    <x-post-table :$posts />
</x-layouts.laravel-board>
