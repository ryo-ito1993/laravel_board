<x-layouts.laravel-board>
    <x-slot:title>
        新規投稿
    </x-slot:title>
    <h1>新規投稿</h1>
    @if ($errors->any())
        <x-alert class="danger">
            <x-error-messages :$errors />
        </x-alert>
    @endif
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <x-post-form />
        <input type="submit" value="送信">
    </form>
</x-layouts.laravel-board>
