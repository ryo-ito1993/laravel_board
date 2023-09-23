<x-layouts.laravel-board>
    <x-slot:title>
        投稿一覧
    </x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2 class="mb-4">投稿一覧</h2>
                @if (session('message'))
                    <x-alert class="alert alert-info">
                        {{ session('message') }}
                    </x-alert>
                @endif
                @if (Auth::check())
                    <div class="mb-3">
                        <a href="{{ route('post.create') }}" class="btn btn-primary">新規投稿</a>
                    </div>
                @endif
                <x-post-table :$posts />
            </div>
        </div>
    </div>
</x-layouts.laravel-board>
