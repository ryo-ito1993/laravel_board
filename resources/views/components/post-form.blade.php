<div>
    <label>タイトル</label>
    <input type="text" name="title"
        value="{{ old('title', $post->title) }}">
</div>
<div>
    <label>内容</label>
    <input type="text" name="comment"
        value="{{ old('comment', $post->comment) }}">
