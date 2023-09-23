<table class="table">
    <thead>
        <tr>
            <th>タイトル</th>
            <th>内容</th>
            @if (Auth::check())
                <th>更新</th>
                <th>削除</th>
                <th>コメント</th>
                <th>コメント一覧</th>
                <th>コメント編集</th>
                <th>コメント削除</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td><a href="{{ route('post.show', $post) }}">{{ $post->title }}</a></td>
                <td>{{ $post->comment }}</td>
                @if (Auth::check())
                    <td>
                        @if (auth()->id() == $post->user_id)
                            <a href="{{ route('post.edit', $post) }}" class="btn btn-success">更新</a>
                        @endif
                    </td>
                    <td>
                        @if (auth()->id() == $post->user_id)
                            <form action="{{ route('post.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="削除">
                            </form>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('comment.create', $post) }}" class="btn btn-primary">返信</a>
                    </td>
                    <td colspan="3"></td>
                @endif
            </tr>

            @if (Auth::check())
                @foreach ($post->comments as $comment)
                    <tr>
                        <td colspan="5"></td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            @if (auth()->id() == $comment->user_id)
                                <a href="{{route('comment.edit', $comment)}}" class="btn btn-success">編集</a>
                            @endif
                        </td>
                        <td>
                            @if (auth()->id() == $comment->user_id)
                                <form action="{{route('comment.destroy', $comment)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="削除">
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        @endforeach
    </tbody>
</table>
