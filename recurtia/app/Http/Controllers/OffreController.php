<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{

    /**
     * Dashboard candidat
     * Affiche les offres recommandées
     */
    public function dashboard()
    {
        // Un recruteur possède son propre tableau de bord
        if (Auth::user()->isRecruteur()) {
            return redirect()->route('recruteur.dashboard');
        }

        // Récupérer les offres disponibles
        $offres = Offre::latest()->take(5)->get();

        return view('dashboard.candidat', compact('offres'));
    }



    /**
     * Liste des offres avec recherche + tri
     */
    public function index(Request $request)
    {

        $query = Offre::query();


        // Recherche
        if ($request->filled('recherche')) {

            $query->where(function ($q) use ($request) {

                $q->where('titre', 'like', '%' . $request->recherche . '%')
                  ->orWhere('entreprise', 'like', '%' . $request->recherche . '%')
                  ->orWhere('localisation', 'like', '%' . $request->recherche . '%');

            });

        }



        // Tri
        if ($request->tri == "recent") {

            $query->orderBy('created_at', 'desc');

        } elseif ($request->tri == "ancien") {

            $query->orderBy('created_at', 'asc');

        } elseif ($request->tri == "entreprise") {

            $query->orderBy('entreprise', 'asc');

        }



        $offres = $query->paginate(5);


        return view('offres.index', compact('offres'));

    }




    /**
     * Envoyer une candidature
     */
    public function postuler(Request $request, $id)
    {

        $request->validate([

            'cv' => 'required|mimes:pdf|max:2048',

            'lettre_motivation' => 'required|string',

        ]);



        // Vérifier si l'utilisateur a déjà postulé

        $exists = Candidature::where('user_id', Auth::id())
            ->where('offre_id', $id)
            ->exists();



        if ($exists) {

            return redirect('/offres')
                ->with('error', 'Vous avez déjà postulé à cette offre');

        }



        // Vérifier que l'offre existe

        $offre = Offre::findOrFail($id);



        // Stocker le CV

        $cvPath = $request->file('cv')
            ->store('cv', 'public');



        // Création candidature

        Candidature::create([

            'user_id' => Auth::id(),

            'offre_id' => $offre->id,

            'cv' => $cvPath,

            'lettre_motivation' => $request->lettre_motivation,

            'statut' => 'en_attente',

        ]);



        return redirect('/offres')
            ->with('success', 'Candidature envoyée avec succès');

    }





    /**
     * Voir les candidatures du candidat connecté
     */
    public function mesCandidatures()
    {

        $candidatures = Candidature::with('offre')
            ->where('user_id', Auth::id())
            ->get();


        return view(
            'candidatures.index',
            compact('candidatures')
        );

    }

    /**
 * Afficher une offre
     */
    public function show($id)
    {
        $offre = Offre::findOrFail($id);

        return view('offres.show', compact('offre'));
    }

    public function formPostuler($id)
    {

    $offre = Offre::findOrFail($id);


    return view('offres.postuler', compact('offre'));

    }


}