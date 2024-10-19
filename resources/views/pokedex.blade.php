@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @forelse ($pokemons as $pokemon)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-lg rounded-lg hover-card">
                        @if ($pokemon->photo)
                            <div class="card-image">
                                <img src="{{ asset('storage/' . $pokemon->photo) }}" class="card-img-top"
                                    alt="{{ $pokemon->name }}">
                                <div class="card-overlay d-flex justify-content-between align-items-center p-2">
                                    <span
                                        class="badge badge-custom">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    <span class="badge badge-type">{{ $pokemon->primary_type }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <a href="{{ route('pokemon.show', $pokemon->id) }}"
                                    class="text-decoration-none">{{ $pokemon->name }}</a>
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
            background-color: #e3f2fd;
            font-family: 'Arial', sans-serif;
        }

        .hover-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid transparent;
            background: linear-gradient(145deg, #ffffff, #e3f2fd);
            border-radius: 20px;
        }

        .hover-card:hover {
            transform: scale(1.07);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            border: 2px solid #1e88e5;
        }

        .card-image {
            position: relative;
            overflow: hidden;
            border-radius: 20px 20px 0 0;
        }

        .card-img-top {
            border-radius: 20px 20px 0 0;
            transition: transform 0.4s ease-in-out, filter 0.3s;
        }

        .hover-card:hover .card-img-top {
            transform: scale(1.05);
            filter: brightness(1.2);
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3));
            color: white;
            border-radius: 0 0 20px 20px;
            padding: 10px;
            transition: background 0.4s;
        }

        .hover-card:hover .card-overlay {
            background: rgba(0, 0, 0, 0.85);
        }

        .card-body {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 0 0 20px 20px;
            padding: 1.5rem;
        }

        .card-title {
            font-weight: bold;
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            transition: color 0.3s;
        }

        .card-title a {
            color: #0d47a1;
        }

        .card-title a:hover {
            color: #1976d2;
        }

        .badge {
            font-size: 0.85rem;
            padding: 0.4rem 0.8rem;
            border-radius: 12px;
        }

        .badge-custom {
            background-color: #1e88e5;
            color: white;
        }

        .badge-type {
            background-color: #ffca28;
            color: #0d47a1;
        }

        @media (max-width: 768px) {
            .card-title {
                font-size: 1.2rem;
            }

            .badge {
                font-size: 0.75rem;
            }
        }
    </style>
@endsection
