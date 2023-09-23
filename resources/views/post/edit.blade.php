<x-layouts.laravel-board>
    <x-slot:title>
        投稿更新
    </x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="mb-4">投稿更新</h2>
                @if ($errors->any())
                    <x-alert class="alert alert-danger">
                        <x-error-messages :errors="$errors" />
                    </x-alert>
                @endif
                <form action="{{ route('post.update', $post) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-post-form :$post />
                    <input type="submit" class="btn btn-primary mt-3" value="送信">
                </form>
            </div>
        </div>
    </div>
</x-layouts.laravel-board>
