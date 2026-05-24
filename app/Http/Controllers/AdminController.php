<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $total = Profile::count();
        $en_attente = Profile::where('statut', 'en_attente')->count();
        $approuves = Profile::where('statut', 'approuve')->count();
        $rejetes = Profile::where('statut', 'rejete')->count();
        $profiles = Profile::orderBy('created_at', 'desc')->paginate(10);

        // donnees pour les graphiques
        $par_categorie = Profile::selectRaw('categorie, count(*) as total')
            ->groupBy('categorie')
            ->pluck('total', 'categorie');

        $par_niveau = Profile::selectRaw('niveau_etude, count(*) as total')
            ->groupBy('niveau_etude')
            ->pluck('total', 'niveau_etude');

        return view('admin.index', compact('total', 'en_attente', 'approuves', 'rejetes', 'profiles', 'par_categorie', 'par_niveau'
        ));
    }

    public function approuver(Profile $profile) {
        $profile->update(['statut' => 'approuve']);

        return redirect()->route('admin.index')
            ->with('success', 'Profil approuvé avec succès.');
    }

    public function rejeter(Profile $profile) {
        $profile->update(['statut' => 'rejete']);

        return redirect()->route('admin.index')
            ->with('success', 'Profil rejeté.');
    }

    public function supprimer(Profile $profile) {
        $profile->delete();

        return redirect()->route('admin.index')
            ->with('success', 'Profil supprimé.');
    }

    // export Excel
    public function exportExcel() {
        $profiles = Profile::all();
        $filename = 'profils_' . date('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename .'"',
        ];

        $callback = function () use ($profiles) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Nom complet', 'Catégorie', 'Secteur', 'Niveau étude', 'Localisation', 'Téléphone', 'Statut', 'Date' ]);
            foreach ($profiles as $profile) {
                fputcsv($file, [
                    $profile->id,
                    $profile->nom_complet,
                    $profile->categorie,
                    $profile->secteur,
                    $profile->niveau_etude,
                    $profile->localisation,
                    $profile->telephone,
                    $profile->statut,
                    $profile->created_at->format('d/m/Y'),
                ]);
            }
            fclose($file);
        };
        return response()-> stream($callback, 200, $headers);
    }

    // Export PDF
    public function exportPdf()
    {
        $profiles = Profile::all();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.export-pdf', compact('profiles'));
        return $pdf->download('profils_' . date('Y-m-d') . '.pdf');
    }
}
