@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @forelse ($pokemons as $pokemon)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm rounded-3 hover-card">
                        @if ($pokemon->photo)
                            <div class="card-image">
                                <img src="{{ asset('storage/' . $pokemon->photo) }}" class="card-img-top" alt="{{ $pokemon->name }}">
                                <div class="card-overlay d-flex justify-content-between align-items-center p-2">
                                    <span class="badge bg-primary">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    <span class="badge bg-warning text-dark">{{ $pokemon->primary_type }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <a href="{{ route('pokemon.show', $pokemon->id) }}" class="text-decoration-none text-dark">{{ $pokemon->name }}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No Pokemon found.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $pokemons->links() }}
        </div>
    </div>

    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Arial', sans-serif;
        }

        .hover-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid transparent;
        }

        .hover-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
            border: 2px solid #007bff;
        }

        .card-image {
            position: relative;
            overflow: hidden;
            border-radius: 10px 10px 0 0;
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4));
            color: white;
            border-radius: 0 0 10px 10px;
            padding: 10px;
            transition: background 0.3s;
        }

        .card-overlay:hover {
            background: rgba(0, 0, 0, 0.9);
        }

        .card-body {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 0 0 10px 10px;
            padding: 1.5rem;
            color: #fff;
        }

        .card-title {
            font-weight: bold;
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            transition: color 0.3s;
        }

        .card-title a {
            color: #fff;
        }

        .card-title a:hover {
            color: #007bff;
        }

        .badge {
            font-size: 0.9rem;
            padding: 0.5rem;
        }

        @media (max-width: 768px) {
            .card-title {
                font-size: 1.2rem;
            }

            .badge {
                font-size: 0.8rem;
            }
        }
    </style>
@endsection
