@extends('layouts.app')

@section('title', 'Edit Pokemon')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">Edit Pokemon</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pokemon->name) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="species" class="form-label">Species</label>
                            <input type="text" class="form-control" id="species" name="species" value="{{ old('species', $pokemon->species) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="primary_type" class="form-label">Primary Type</label>
                        <select class="form-select" id="primary_type" name="primary_type" required>
                            <option disabled>Pilih Primary Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type }}" {{ old('primary_type', $pokemon->primary_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="weight" class="form-label">Weight (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="{{ old('weight', $pokemon->weight) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="height" class="form-label">Height (m)</label>
                            <input type="number" step="0.01" class="form-control" id="height" name="height" value="{{ old('height', $pokemon->height) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="hp" class="form-label">HP</label>
                            <input type="number" class="form-control" id="hp" name="hp" value="{{ old('hp', $pokemon->hp) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="attack" class="form-label">Attack</label>
                            <input type="number" class="form-control" id="attack" name="attack" value="{{ old('attack', $pokemon->attack) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="defense" class="form-label">Defense</label>
                            <input type="number" class="form-control" id="defense" name="defense" value="{{ old('defense', $pokemon->defense) }}">
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_legendary" name="is_legendary" value="1" {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_legendary">Is Legendary</label>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        @if ($pokemon->photo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="Photo Pokemon" width="150" class="rounded">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('pokemon.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
