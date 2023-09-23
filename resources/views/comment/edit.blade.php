<x-layouts.laravel-board>
    <x-slot:title>
        コメント編集
    </x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="mb-4">返信編集</h2>
                @if ($errors->any())
                    <x-alert class="alert alert-danger">
                        <x-error-messages :errors="$errors" />
                    </x-alert>
                @endif
                <form action="{{ route('comment.update', $comment) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="comment" class="form-label">コメント</label>
                        <input type="text" class="form-control" id="comment" name="comment"
                            value="{{ old('comment', $comment->comment) }}">
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="送信">
                </form>
            </div>
        </div>
    </div>
</x-layouts.laravel-board>
