<html>
<head>
  <meta charset="UTF-8" />
  <title>Buy Board Games Online | Family, Strategy & Party Games</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta
    name="description"
    content="Discover the best board games for every type of player. Shop family games, strategy games, party games, and modern tabletop hits to level up your game night."
  />
  <meta
    name="keywords"
    content="board games, buy board games, family board games, strategy games, party games, tabletop games, card games, cooperative games"
  />
  <meta name="author" content="Your Store Name" />

  <!-- Open Graph / Social Sharing -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Buy Board Games Online | Family, Strategy & Party Games" />
  <meta
    property="og:description"
    content="Shop a curated collection of board games that bring friends and families together for unforgettable game nights."
  />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />

  <!-- Favicon -->
  <link rel="icon" href="/favicon.png" type="image/x-icon" />

  <!-- Fonts / Styles (optional examples) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap"
    rel="stylesheet"
  />



    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body>

     @if (session('success'))
      <div class="alert alert-success mt-4  text-center"
          style="background-color: hsl(349, 100%, 96%); text-decoration: none; color: #4f46e5; font-weight: 800;">
            {{ session('success') }}
        </div>
    @endif
    <header>
       <nav>
        <h1> Boardgame for Learning</h1>
        {{-- auth()->user() ? "Hi, " . auth()->user()->name : ' '--}}
          <div class="nav-links">
          <a href="/boardgames" class="btn"> Game List</a>

          @guest
            <a href="{{ route('show.register')  }}" class="btn"> Register</a>
            <a href="{{ route('show.login') }}" class="btn"> Login</a>      
          @endguest
          
          @auth
            <span class="pr-2">{{auth()->user() ? "Hi, " . auth()->user()->name : ' '}}</span>
            <a href="/boardgames/create" class="btn"> Suggest a boardgame</a>
            <form method="POST" action="{{ route('logout') }}" class="m-0 d-inline">
              @csrf
              <button type="submit" class="btn">Logout</button>
            </form>
          @endauth
        </div>
      </nav>
    </header>

    <main class="container">
        {{$slot}}
    </main>
</body>

</html>