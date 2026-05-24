<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Profile;


class CommunauteController extends Controller
{
    public function index(Request $request){
        $query = Profile::where('statut', 'approuve');

        if ($request->filled('q')) {
            $query->where('nom_complet', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('secteur')) {
            $query->where('secteur', $request->secteur);
        }

        if ($request->filled('categorie')) {
            $query->where('categorie', $request->categorie);
        }

        $profiles = $query->paginate(12);

        return view('communaute.index', compact('profiles'));
    }

    public function create(){
        return view('communaute.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nom_complet' => 'required|string|max:255',
            'secteur' => 'nullable|string|max:255',
            'niveau_etude' => 'nullable|string|max:255',
            'localisation' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'categorie' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:2048',
        ]);

        if ($request->hasFile('photo')){
            $data['photo_path'] = $request->file('photo')->store('photos', 'public');
        }

        $data['user_id'] = auth()->id();
        $data['statut'] = 'en_attente';

        Profile::create($data);

        return redirect()->route('communaute.index')
            ->with('success', 'Votre profil a été soumis et est en attente de validation.');

    }

    public function show(Profile $profile){
        return view('communaute.show', compact('profile'));
    }
}
 