<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Library Collection</title>
</head>
<body>

    <h1>Library Collection</h1>

    <h2>Available Books</h2>

    <ul>
        @foreach ($books as $book)
            <li>
                <!-- Linking to a dynamic route using the book's ID wildcard -->
                <a href="/books/{{ $book['id'] }}">
                    <strong>{{ $book['title'] }}</strong>
                </a><br>
                Author: {{ $book['author'] }}<br>
                ID: {{ $book['id'] }}
            </li>
        @endforeach
    </ul>

</body>
</html>