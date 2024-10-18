@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Pokedex Card</h2>
    <div class="row">
        @forelse ($pokemons as $pokemon)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($pokemon->photo)
                        <img src="{{ asset('storage/' . $pokemon->photo) }}" class="card-img-top" alt="{{ $pokemon->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $pokemon->name }}</h5>
                        <p class="card-text">ID: {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
                        <p class="card-text">Type: {{ $pokemon->primary_type }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No Pokemon found.</p>
        @endforelse
    </div>
</div>
@endsection
