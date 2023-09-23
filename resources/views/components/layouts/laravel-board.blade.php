<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
</head>
<body>
    <header>
        Laravel掲示板
        <hr>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <hr>
        Laravel掲示板
    </footer>
</body>
</html>
