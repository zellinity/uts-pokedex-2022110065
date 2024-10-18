<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {

        $pokemons = Pokemon::orderBy('id', 'asc')->paginate(20);
        return view('pokemon.index', compact('pokemons'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = ['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'];
        return view('pokemon.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'nullable|numeric|max:999999.99',
            'height' => 'nullable|numeric|max:999999.99',
            'hp' => 'nullable|integer|max:9999',
            'attack' => 'nullable|integer|max:9999',
            'defense' => 'nullable|integer|max:9999',
            'is_legendary' => 'nullable|boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $lastPokemon = DB::table('pokemons')->orderBy('id', 'desc')->first();
        $lastId = $lastPokemon ? intval($lastPokemon->id) : 0;
        $newId = str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }

        $validated['id'] = $newId;
        $validated['is_legendary'] = $request->has('is_legendary');


        Pokemon::create($validated);

        return redirect()->route('pokemon.index')
            ->with('success', 'Pokemon berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        $types = ['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'];
        return view('pokemon.edit', compact('pokemon', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'nullable|numeric|max:999999.99',
            'height' => 'nullable|numeric|max:999999.99',
            'hp' => 'nullable|integer|max:9999',
            'attack' => 'nullable|integer|max:9999',
            'defense' => 'nullable|integer|max:9999',
            'is_legendary' => 'nullable|boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($pokemon->photo) {
                Storage::disk('public')->delete($pokemon->photo);
            }
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }

        $validated['is_legendary'] = $request->has('is_legendary') ? true : false;


        $pokemon->update($validated);

        return redirect()->route('pokemon.index')
            ->with('success', 'Pokemon berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        if ($pokemon->photo) {
            Storage::disk('public')->delete($pokemon->photo);
        }

        $pokemon->delete();

        return redirect()->route('pokemon.index')
            ->with('success', 'Pokemon berhasil dihapus.');
    }
}
