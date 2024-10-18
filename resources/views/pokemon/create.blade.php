@extends('layouts.app')

@section('title', 'Tambah Pokemon')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm rounded">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Tambah Pokemon</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control shadow-sm" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="species" class="form-label">Species</label>
                            <input type="text" class="form-control shadow-sm" id="species" name="species" value="{{ old('species') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="primary_type" class="form-label">Primary Type</label>
                            <select class="form-select shadow-sm" id="primary_type" name="primary_type" required>
                                <option selected disabled>Pilih Primary Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type }}" {{ old('primary_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="weight" class="form-label">Weight (kg)</label>
                            <input type="number" step="0.01" class="form-control shadow-sm" id="weight" name="weight" value="{{ old('weight', 0) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="height" class="form-label">Height (m)</label>
                            <input type="number" step="0.01" class="form-control shadow-sm" id="height" name="height" value="{{ old('height', 0) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="hp" class="form-label">HP</label>
                            <input type="number" class="form-control shadow-sm" id="hp" name="hp" value="{{ old('hp', 0) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="attack" class="form-label">Attack</label>
                            <input type="number" class="form-control shadow-sm" id="attack" name="attack" value="{{ old('attack', 0) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="defense" class="form-label">Defense</label>
                            <input type="number" class="form-control shadow-sm" id="defense" name="defense" value="{{ old('defense', 0) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_legendary" name="is_legendary" value="1" {{ old('is_legendary') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_legendary">Is Legendary</label>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control shadow-sm" id="photo" name="photo">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('pokemon.index') }}" class="btn btn-secondary shadow-sm">Kembali</a>
                        <button type="submit" class="btn btn-primary shadow-sm">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
