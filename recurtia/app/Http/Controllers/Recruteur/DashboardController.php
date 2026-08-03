<?php

namespace App\Http\Controllers\Recruteur;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Tableau de bord du recruteur : statistiques et dernières offres.
     */
    public function index()
    {
        $user = Auth::user();

        $offres = $user->offres()->latest()->get();

        $offreIds = $offres->pluck('id');

        $candidatures = Candidature::whereIn('offre_id', $offreIds)->get();

        $stats = [
            'nb_offres' => $offres->count(),
            'nb_candidatures' => $candidatures->count(),
            'nb_en_attente' => $candidatures->where('statut', 'en_attente')->count(),
            'nb_acceptees' => $candidatures->where('statut', 'acceptee')->count(),
        ];

        $dernieresOffres = $offres->take(5);

        $dernieresCandidatures = Candidature::whereIn('offre_id', $offreIds)
            ->with(['offre', 'user'])
            ->latest()
            ->take(5)
            ->get();

        return view('recruteur.dashboard', compact('stats', 'dernieresOffres', 'dernieresCandidatures'));
    }
}
