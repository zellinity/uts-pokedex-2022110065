@extends('layouts.app')

@section('title', 'Detail Pokemon')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="row g-0">
                @if ($pokemon->photo)
                    <div class="col-md-4 bg-light d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('storage/' . $pokemon->photo) }}" class="img-fluid rounded shadow-sm"
                            alt="{{ $pokemon->name }}" style="max-width: 100%; height: auto;">
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <h2 class="card-title mb-3">{{ $pokemon->name }} <small
                                class="text-muted">(#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }})</small></h2>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <p class="card-text"><strong>Species:</strong> {{ $pokemon->species }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text"><strong>Primary Type:</strong>
                                    <span class="badge bg-primary">{{ $pokemon->primary_type }}</span>
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <p class="card-text"><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text"><strong>Height:</strong> {{ $pokemon->height }} m</p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <p class="card-text"><strong>HP:</strong> {{ $pokemon->hp }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <p class="card-text"><strong>Attack:</strong> {{ $pokemon->attack }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <p class="card-text"><strong>Defense:</strong> {{ $pokemon->defense }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <p class="card-text"><strong>Total Power:</strong>
                                    {{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text">
                                    <strong>Legendary Status:</strong>
                                    <span
                                        class="badge {{ $pokemon->is_legendary ? 'bg-warning text-dark' : 'bg-secondary' }}">
                                        {{ $pokemon->is_legendary ? 'Legendary' : 'Not Legendary' }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <a href="{{ route('pokemon.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
