<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function index()
    {
        $annonces = Annonce::orderBy('created_at', 'desc')->paginate(10);
        return view('annonces.index', compact('annonces'));
    }

    public function create() 
    {
        return view('annonces.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'type' => 'required|in:info,alerte,evenement',
        ]);

        Annonce::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'type' => $request->type,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('annonces.index')
            ->with('success', 'Annonce publié avec succès.');
    }

    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('annonces.index')
            ->with('success', 'Annonce supprimée.');
    }
}
