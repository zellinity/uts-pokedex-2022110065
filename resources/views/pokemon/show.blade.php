@extends('layouts.app')

@section('title', 'Detail Pokemon')

@section('content')
    <div class="container mt-5">
        <h2>Detail Pokemon</h2>

        <div class="card mb-3">
            <div class="row g-0">
                @if ($pokemon->photo)
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $pokemon->photo) }}" class="img-fluid rounded-start" alt="{{ $pokemon->name }}">
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pokemon->name }} ({{ $pokemon->id }})</h5>
                        <p class="card-text"><strong>Species:</strong> {{ $pokemon->species }}</p>
                        <p class="card-text"><strong>Primary Type:</strong> {{ $pokemon->primary_type }}</p>
                        <p class="card-text"><strong>Weight:</strong> {{ $pokemon->weight }}</p>
                        <p class="card-text"><strong>Height:</strong> {{ $pokemon->height }}</p>
                        <p class="card-text"><strong>HP:</strong> {{ $pokemon->hp }}</p>
                        <p class="card-text"><strong>Attack:</strong> {{ $pokemon->attack }}</p>
                        <p class="card-text"><strong>Defense:</strong> {{ $pokemon->defense }}</p>
                        <p class="card-text"><strong>Power:</strong> {{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</p>
                        <p class="card-text"><strong>Is Legendary:</strong> {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
                        <a href="{{ route('pokemon.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
