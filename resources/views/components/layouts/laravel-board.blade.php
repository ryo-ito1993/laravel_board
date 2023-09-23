<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-info bg-light">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand" href="{{route('post.index')}}">Laravel掲示板</a>

                <div>
                    @if (Auth::check())
                        <span class="me-3">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">ログアウト</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">ログイン</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">新規登録</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>
    <main class="mt-4 mb-4">
        @if (session('info'))
            <div class="container">
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            </div>
        @endif
        {{ $slot }}
    </main>
</body>
</html>
