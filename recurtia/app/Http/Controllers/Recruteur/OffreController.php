<?php

namespace App\Http\Controllers\Recruteur;

use App\Http\Controllers\Controller;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    /**
     * Liste des offres publiées par le recruteur connecté.
     */
    public function index()
    {
        $offres = Auth::user()->offres()
            ->withCount('candidatures')
            ->latest()
            ->paginate(8);

        return view('recruteur.offres.index', compact('offres'));
    }

    /**
     * Formulaire de création d'une offre.
     */
    public function create()
    {
        return view('recruteur.offres.create');
    }

    /**
     * Enregistrer une nouvelle offre.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'entreprise' => ['required', 'string', 'max:255'],
            'localisation' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $data['user_id'] = Auth::id();

        Offre::create($data);

        return redirect()
            ->route('recruteur.offres.index')
            ->with('success', 'Offre publiée avec succès');
    }

    /**
     * Formulaire de modification d'une offre.
     */
    public function edit(Offre $offre)
    {
        $this->autoriser($offre);

        return view('recruteur.offres.edit', compact('offre'));
    }

    /**
     * Mettre à jour une offre.
     */
    public function update(Request $request, Offre $offre)
    {
        $this->autoriser($offre);

        $data = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'entreprise' => ['required', 'string', 'max:255'],
            'localisation' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $offre->update($data);

        return redirect()
            ->route('recruteur.offres.index')
            ->with('success', 'Offre mise à jour avec succès');
    }

    /**
     * Supprimer une offre.
     */
    public function destroy(Offre $offre)
    {
        $this->autoriser($offre);

        $offre->delete();

        return redirect()
            ->route('recruteur.offres.index')
            ->with('success', 'Offre supprimée');
    }

    /**
     * Vérifie que l'offre appartient bien au recruteur connecté.
     */
    private function autoriser(Offre $offre): void
    {
        if ($offre->user_id !== Auth::id()) {
            abort(403, "Cette offre ne vous appartient pas.");
        }
    }
}
