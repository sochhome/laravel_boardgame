<x-layout>
    <div class="container border-dashed bg-white p-4">
        <h2>{{ $boardgame->title }}</h2>
        <p>This page displays information specific for Product ID: {{ $boardgame->id }} </p>
        <p>Price: ${{ $boardgame->price }}</p>
        <p>Author: {{ $boardgame->author }}</p>
        <p>Updated at: {{ $boardgame->updated_at }}</p>
        <p>Status: {{ $boardgame->status }}</p>
    </div>

    {{-- Learning Classes --}}
    <div class="container p-4">
        <h3>Learning Classes for {{ $boardgame->title }}</h3>
        @if ($boardgame->learningClasses->isEmpty())
            <p>No learning classes available for this board game.</p>
        @else
            <ul>
                @foreach ($boardgame->learningClasses as $class)
                    <li>
                        <h4>{{ $class->name }}</h4>
                        <p>Instructor: {{ $class->instructor }}</p>
                        <p>Description: {{ $class->description }}</p>
                        <p>Location: {{ $class->location }}</p>
                        <p>Start Time: {{ $class->start_time }}</p>
                        <p>Duration: {{ $class->duration }}</p>
                        <p>Hourly Price: ${{ $class->hourly_price }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <form action="{{ route('boardgames.destroy', $boardgame->id) }}" method="POST" class="container p-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Boardgame</button>
    </form>
    <a href="/boardgames">Return to Store</a>
</x-layout>