<x-layouts.laravel-board>
    <x-slot:title>
        投稿更新
    </x-slot:title>

    <h1>投稿更新</h1>
    @if ($errors->any())
        <x-alert class="danger">
            <x-error-messages :errors="$errors" />
        </x-alert>
    @endif
    <form action="{{ route('post.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <x-post-form :$post />
        <input type="submit" value="送信">
    </form>
</x-layouts.laravel-board>
