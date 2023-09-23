<x-layouts.laravel-board>
    <x-slot:title>
        投稿詳細
    </x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="mb-4">投稿詳細</h2>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">ID：{{ $post->id }}</p>
                        <p class="card-text">タイトル：{{ $post->title }}</p>
                        <p class="card-text">内容：{{ $post->comment }}</p>
                    </div>
                </div>
                <a href="{{ route('post.index') }}" class="btn btn-secondary mt-3">戻る</a>
            </div>
        </div>
    </div>
</x-layouts.laravel-board>
