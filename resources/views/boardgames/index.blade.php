
<x-layout>
    <h1>Board Game Store</h1>
    <p class="text-right mr-5"> Shop:  {{ $shopStatus }} </p>

    <h2>Available Board Games</h2>
		<table class="boardgame-table">
			<thead>
				<tr>
					<th>🎲</th>
					<th>Title</th>
					<th>Learning Classes</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				@foreach ($boardgames as $game)
					<tr class="{{ $game['price'] < 10 ? 'highlight' : '' }}">
						<td class="icon">🎲</td>

						<td>{{ $game['title'] }}</td>

						<td>{{ $game->learningClasses->count() }}</td>

						<td>
							<a class="view-btn" href="/boardgames/{{ $game['id'] }}">
								View
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

    {{$boardgames->links()}} {{-- Pagination links --}}
</x-layout>