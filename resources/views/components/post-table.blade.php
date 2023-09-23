<table class="table table-striped">
    <tr>
        <th>書籍名</th>
        <th>内容</th>
        @if (Auth::check())
            <th>更新</th>
            <th>削除</th>
        @endif
    </tr>
    @foreach ($posts as $post)
        <tr>
            <td>
                <a href="{{ route('post.show', $post) }}">
                    {{ $post->title }}
                </a>
            </td>
            <td>{{ $post->comment }}</td>
            @if (Auth::check())
                @if (auth()->id() == $post->user_id)
                    <td>
                        <a href="{{ route('post.edit', $post) }}" class="btn btn-success">
                            更新
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('post.destroy', $post) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="削除">
                        </form>
                    </td>
                @else
                    <td></td>
                    <td></td>
                @endif
            @endif
        </tr>
    @endforeach
</table>
