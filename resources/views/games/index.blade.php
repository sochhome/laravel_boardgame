{{-- resources/views/games/index.blade.php --}}
{{-- Prepared by Jos So --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Game Store</title>
</head>
<body>

    <h1>Game Store</h1>

    <p>Status: <strong>{{ $status }}</strong></p>

    <h2>Available Games</h2>

    <ul>
        @foreach ($gameList as $game)
            <li>
                <strong>{{ $game['title'] }}</strong><br>
                Price: ${{ $game['price'] }}<br>
                ID: {{ $game['id'] }}
            </li>
        @endforeach
    </ul>

</body>
</html>