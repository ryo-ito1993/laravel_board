<x-layouts.laravel-board>
    <x-slot:title>
        コメント投稿
    </x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="mb-4">返信投稿</h2>
                @if ($errors->any())
                    <x-alert class="alert alert-danger">
                        <x-error-messages :errors="$errors" />
                    </x-alert>
                @endif
                <form action="{{ route('comment.store', $post) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="comment" class="form-label">コメント</label>
                        <input type="text" class="form-control" id="comment" name="comment"
                            value="{{ old('comment') }}">
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="送信">
                </form>
            </div>
        </div>
    </div>
</x-layouts.laravel-board>
