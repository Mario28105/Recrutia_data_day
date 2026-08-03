<?php

namespace App\Http\Controllers\Recruteur;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    /**
     * Liste des candidatures reçues sur les offres du recruteur,
     * avec filtre optionnel par offre et par statut.
     */
    public function index(Request $request)
    {
        $offreIds = Auth::user()->offres()->pluck('id');

        $query = Candidature::whereIn('offre_id', $offreIds)
            ->with(['offre', 'user.candidat']);

        if ($request->filled('offre_id')) {
            $query->where('offre_id', $request->offre_id);
        }

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        $candidatures = $query->latest()->paginate(10)->withQueryString();

        $offres = Auth::user()->offres()->get(['id', 'titre']);

        return view('recruteur.candidatures.index', compact('candidatures', 'offres'));
    }

    /**
     * Détail d'une candidature (profil du candidat, CV, lettre de motivation).
     */
    public function show(Candidature $candidature)
    {
        $this->autoriser($candidature);

        $candidature->load(['offre', 'user.candidat']);

        return view('recruteur.candidatures.show', compact('candidature'));
    }

    /**
     * Met à jour le statut d'une candidature (en_attente, acceptee, refusee, entretien).
     */
    public function updateStatut(Request $request, Candidature $candidature)
    {
        $this->autoriser($candidature);

        $request->validate([
            'statut' => ['required', 'in:en_attente,entretien,acceptee,refusee'],
        ]);

        $candidature->update(['statut' => $request->statut]);

        return redirect()
            ->back()
            ->with('success', 'Statut de la candidature mis à jour');
    }

    /**
     * Télécharge le CV joint à une candidature (disque privé).
     */
    public function telechargerCv(Candidature $candidature)
    {
        $this->autoriser($candidature);

        if (! $candidature->cv) {
            abort(404, "Aucun CV joint à cette candidature.");
        }

        // Le CV a pu être stocké sur le disque privé (défaut) ou public selon
        // le formulaire de candidature utilisé ; on essaie les deux.
        foreach (['local', 'public'] as $disk) {
            if (\Illuminate\Support\Facades\Storage::disk($disk)->exists($candidature->cv)) {
                return \Illuminate\Support\Facades\Storage::disk($disk)->download($candidature->cv);
            }
        }

        abort(404, "Fichier introuvable.");
    }

    /**
     * Vérifie que la candidature concerne bien une offre du recruteur connecté.
     */
    private function autoriser(Candidature $candidature): void
    {
        if ($candidature->offre->user_id !== Auth::id()) {
            abort(403, "Cette candidature ne concerne pas une de vos offres.");
        }
    }
}
