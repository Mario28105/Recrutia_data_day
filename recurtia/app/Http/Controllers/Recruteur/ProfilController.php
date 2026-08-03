<?php

namespace App\Http\Controllers\Recruteur;

use App\Http\Controllers\Controller;
use App\Models\Recruteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Formulaire de profil de l'entreprise / recruteur.
     */
    public function edit()
    {
        $recruteur = Auth::user()->recruteur;

        return view('recruteur.profil', compact('recruteur'));
    }

    /**
     * Mettre à jour le profil recruteur.
     */
    public function update(Request $request)
    {
        $request->validate([
            'entreprise' => ['required', 'string', 'max:255'],
            'poste' => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:30'],
            'site_web' => ['nullable', 'url', 'max:255'],
            'description_entreprise' => ['nullable', 'string'],
        ]);

        Recruteur::updateOrCreate(
            ['user_id' => Auth::id()],
            $request->only([
                'entreprise',
                'poste',
                'telephone',
                'site_web',
                'description_entreprise',
            ])
        );

        return redirect()
            ->back()
            ->with('success', 'Profil mis à jour');
    }
}
