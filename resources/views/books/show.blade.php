<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Book Details</title>
</head>
<body>

    <h1>Book Details</h1>

    @php
        // Same sample data used in the /books route
        $books = [
            ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'id' => 1],
            ['title' => '1984', 'author' => 'George Orwell', 'id' => 2],
        ];

        // Find the book whose id matches the wildcard
        $book = collect($books)->firstWhere('id', $id);
    @endphp

    @if ($book)
        <h2>{{ $book['title'] }}</h2>
        <p><strong>Author:</strong> {{ $book['author'] }}</p>
        <p><strong>ID:</strong> {{ $book['id'] }}</p>
    @else
        <p>Book not found.</p>
    @endif

    <p><a href="/books">Back to list</a></p>

</body>
</html>