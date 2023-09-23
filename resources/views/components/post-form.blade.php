<div class="mb-3">
    <label for="title" class="form-label">タイトル</label>
    <input type="text" class="form-control" id="title" name="title"
        value="{{ old('title', $post->title) }}">
</div>
<div class="mb-3">
    <label for="comment" class="form-label">内容</label>
    <input type="text" class="form-control" id="comment" name="comment"
        value="{{ old('comment', $post->comment) }}">
