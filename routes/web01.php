<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('welcome');
});

// Route::get('/', function () {
//	return 'Hello Jos';
// });

Route::get('/intro', function () {
	return view('hello');
});

Route::get('/user/{id}', function ($id) {
 return "User: $id"; 
});

Route::get('/games', function () {
    // Array of arrays representing game records
    $games = [
        ['title' => 'Stardew Valley', 'price' => 15, 'id' => 101],
        ['title' => 'Elden Ring', 'price' => 60, 'id' => 102],
    ];

    // The key 'gameList' becomes the variable $gameList in Blade
    return view('games.index', [
        'gameList' => $games,
        'status' => 'Open for Business'
    ]);
});

// The {id} wildcard matches any value provided in that URL segment
Route::get('/games/{id}', function ($id) {
    // Later, you might use this $id to fetch a specific game from a database [7]
    return view('games.show', ['id' => $id]);
});

// Tutorial 5 SEHS4517 
Route::get('/sehs4517', function () { return "SEHS4517 Web Application Development and Management"; });

Route::get('/hello', function () { return "<h1>Hello World</h1>"; });

Route::get('/something', function () { return view('demo'); });

// Tutorial Book Routes
Route::get('/books', function () {
    // A sample array of books representing database records
    $books = [
        ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'id' => 1],
        ['title' => '1984', 'author' => 'George Orwell', 'id' => 2],
    ];

    // Pass the 'books' array and a 'header' string to the view
    return view('books.index', [
        'books' => $books,
        'header' => 'Welcome to the Library'
    ]);
});

// The {id} is the dynamic wildcard
Route::get('/books/{id}', function ($id) {
    // Pass the captured $id variable into the 'books.show' view
    return view('books.show', ['id' => $id]);
});

Route::get('/boardgames', function () {
    $boardgames = [
        ['title' => 'Silencio', 'author' => 'Sebastiem Caiveau', 'id' => 1, 'price' => 7],
        ['title' => 'Patchwork', 'author' => 'Uwe Rosenberg', 'id' => 2, 'price' =>15],
        ['title' => 'Cafe Fatal', 'author' => 'Brett J. Gilbert', 'id' => 3, 'price' => 8],
        ['title' => 'Overload', 'author' => 'Wolfand Riedl', 'id' => 4, 'price' =>20],
        ['title' => 'Catan', 'author' => 'Klaus Teuber', 'id' => 5, 'price' =>25],
    ];
    return view('boardgames.index', [
        'shopStatus' => 'Currently Open',
        'boardgames' => $boardgames
    ]);
});
Route::get('/boardgames/create', function () {
    return view('boardgames.create');
});

Route::get('/boardgames/{id}', function ($id) {
    return view('boardgames.show', ['id' => $id]);
});