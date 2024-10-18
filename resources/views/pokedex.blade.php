@extends('layouts.app')

@section('content')
    <div class="container mt-5">
            <div class="row">
                 @forelse ($pokemon as $pokemon)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if ($pokemon->photo)
                    <img src="{{ asset('storage/' . $pokemon->photo) }}" class="card-img-top" alt="{{ $pokemon->name }}">
                @endif
                <div class="card-body">
                    <p class="card-text">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
                    <h5 class="card-title">{{ $pokemon->name }}</h5>
                    <p class="card-text">{{ $pokemon->primary_type }}</p>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="text-center">No Pokemon found.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $pokemon->links() }}
    </div>
    </div>
@endsection
