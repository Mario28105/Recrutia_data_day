<?php
public function postuler(Request $request, $id)
{
    Candidature::create([
        'user_id' => auth()->id(),
        'offre_id' => $id,
        'statut' => 'en_attente',
    ]);

    return redirect('/offres')->with('success', 'Candidature envoyée');
}