@extends('layouts.app')

@section('title', 'Detail Pokemon')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg" style="border-radius: 15px; background: linear-gradient(135deg, #e0f7fa, #80deea);">
            <div class="row g-0">
                @if ($pokemon->photo)
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-4"
                        style="border-top-left-radius: 15px; border-bottom-left-radius: 15px; background: radial-gradient(circle, #ffffff, #d4e8e9); position: relative; overflow: hidden;">
                        <div class="bg-overlay"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.2); transition: opacity 0.3s;">
                        </div>
                        <img src="{{ asset('storage/' . $pokemon->photo) }}" class="img-fluid rounded-circle shadow-lg"
                            alt="{{ $pokemon->name }}"
                            style="max-width: 75%; height: auto; transition: transform 0.6s ease-in-out, filter 0.4s; z-index: 1; filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.4));">
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <h2 class="card-title mb-3" style="font-size: 2.5rem; font-weight: 700; color: #00695c;">
                            {{ $pokemon->name }}
                            <small class="text-muted" style="font-size: 1.2rem;">
                                (#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }})
                            </small>
                        </h2>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <p class="card-text"><strong>Species:</strong> {{ $pokemon->species }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text"><strong>Primary Type:</strong>
                                    <span class="badge bg-primary" style="background-color: #29b6f6; font-size: 1rem;">
                                        {{ $pokemon->primary_type }}
                                    </span>
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <p class="card-text"><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text"><strong>Height:</strong> {{ $pokemon->height }} m</p>
                            </div>

                            <div class="col-md-12 mb-3 d-flex justify-content-start align-items-center">
                                <div class="stat-box me-3" style="width: 100px;">
                                    <p class="card-text" style="margin: 0; font-size: 1rem;"><strong>HP</strong></p>
                                    <span class="badge bg-success" style="font-size: 1rem; background-color: #66bb6a;">
                                        {{ $pokemon->hp }}
                                    </span>
                                </div>
                                <div class="stat-box me-3" style="width: 100px;">
                                    <p class="card-text" style="margin: 0; font-size: 1rem;"><strong>Attack</strong></p>
                                    <span class="badge bg-danger" style="font-size: 1rem; background-color: #ef5350;">
                                        {{ $pokemon->attack }}
                                    </span>
                                </div>
                                <div class="stat-box" style="width: 100px;">
                                    <p class="card-text" style="margin: 0; font-size: 1rem;"><strong>Defense</strong></p>
                                    <span class="badge bg-info" style="font-size: 1rem; background-color: #29b6f6;">
                                        {{ $pokemon->defense }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <p class="card-text"><strong>Total Power:</strong>
                                    <span class="badge bg-dark" style="font-size: 1rem; background-color: #424242;">
                                        {{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="card-text">
                                    <strong>Legendary Status:</strong>
                                    <span
                                        class="badge {{ $pokemon->is_legendary ? 'bg-warning text-dark' : 'bg-secondary' }}"
                                        style="font-size: 1rem;">
                                        {{ $pokemon->is_legendary ? 'Legendary' : 'Not Legendary' }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <a href="{{ url('/') }}" class="btn btn-primary mt-3"
                            style="border-radius: 25px; padding: 10px 20px; background-color: #00796b;">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .col-md-4:hover .bg-overlay {
            opacity: 0.4;
        }

        .col-md-4 img:hover {
            transform: scale(1.2);
            filter: brightness(1.3);
        }

        .stat-box {
            padding: 10px;
            background: #f1f8e9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
    </style>
@endsection
