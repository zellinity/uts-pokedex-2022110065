@extends('layouts.app')

@section('title', 'Daftar Pokemon')

@section('content')
    <div class="container mt-4 p-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-4 text-center">Daftar Pokemon</h1>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col d-flex justify-content-between">
                <a href="{{ route('pokemon.create') }}" class="btn btn-success btn-lg shadow-sm">
                    <i class="fas fa-plus me-2"></i> Add Pokemon
                </a>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                    <i class="fas fa-home me-2"></i> Pokedex Home
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-5">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Species</th>
                                <th scope="col">Primary Type</th>
                                <th scope="col">Power</th>
                                <th scope="col" class="text-center" style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pokemons as $pokemon)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration + ($pokemons->currentPage() - 1) * $pokemons->perPage() }}</td>
                                    <td>
                                        <a href="{{ route('pokemon.show', $pokemon->id) }}"
                                            class="text-decoration-none fw-bold">{{ $pokemon->name }}</a>
                                    </td>
                                    <td>{{ $pokemon->species }}</td>
                                    <td>{{ $pokemon->primary_type }}</td>
                                    <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm me-1"
                                            href="{{ route('pokemon.edit', $pokemon->id) }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada Pokemon ditemukan.</td>
                                    </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center">
                    {!! $pokemons->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
