@extends('layouts.app')

@section('title', 'Daftar Pokemon')

@section('content')
    <div class="mt-4 p-5">
        <h1>Daftar Pokemon</h1>
        <a href="{{ route('pokemon.create') }}" class="btn btn-primary btn-sm mt-3">Tambah Pokemon</a>
        <a href="{{ route('home') }}" class="btn btn-secondary btn-sm mt-3">Kembali ke Home</a>
        <div class="container mt-5">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered mb-5">
                    <thead>
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
                            <tr>
                                <td>{{ $loop->iteration + ($pokemons->currentPage() - 1) * $pokemons->perPage() }}</td>
                                <td>
                                    <a href="{{ route('pokemon.show', $pokemon->id) }}"
                                        class="text-decoration-none">{{ $pokemon->name }}</a>
                                </td>
                                <td>{{ $pokemon->species }}</td>
                                <td>{{ $pokemon->primary_type }}</td>
                                <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('pokemon.edit', $pokemon->id) }}">Edit</a>
                                    <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada Pokemon ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {!! $pokemons->links() !!}
            </div>
        </div>
    @endsection
