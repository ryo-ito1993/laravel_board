<table border="1">
    <tr>
        <th>書籍名</th>
        <th>内容</th>
        <th>更新</th>
        <th>削除</th>
    </tr>
    @foreach ($posts as $post)
        <tr>
            <td>
                <a href="{{ route('post.show', $post) }}">
                    {{ $post->title }}
                </a>
            </td>
            <td>{{ $post->comment }}</td>
            <td>
                <a href="{{ route('post.edit', $post) }}">
                    <button>更新</button>
                </a>
            </td>
            <td>
                <form action="{{ route('post.destroy', $post) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除">
                </form>
            </td>
        </tr>
    @endforeach
</table>
