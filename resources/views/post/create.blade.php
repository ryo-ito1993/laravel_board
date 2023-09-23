<x-layouts.laravel-board>
    <x-slot:title>
        新規投稿
    </x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="mb-4">新規投稿</h2>
                @if ($errors->any())
                    <x-alert class="alert alert-danger">
                        <x-error-messages :$errors />
                    </x-alert>
                @endif
                <form action="{{ route('post.store') }}" method="POST">
                    @csrf
                    <x-post-form />
                    <input type="submit" class="btn btn-primary mt-3" value="送信" onclick="this.disabled=true; this.form.submit();">
                </form>
            </div>
        </div>
    </div>
</x-layouts.laravel-board>
