<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Offre;

use App\Models\Candidature;

use Illuminate\Support\Facades\Auth;



class CandidatureController extends Controller
{


    public function index()
    {


        $candidatures = Candidature::where(
            'user_id',
            Auth::id()
        )
        ->with('offre')
        ->get();



        return view(
            'candidatures.index',
            compact('candidatures')
        );


    }





    public function store(Request $request,$id)
    {



        $request->validate([

            'cv'=>'required|file|mimes:pdf,doc,docx',

            'lettre_motivation'=>'required'

        ]);





        $offre = Offre::findOrFail($id);




        $cv = $request->file('cv')
        ->store('cv');





        Candidature::create([


            'user_id'=>Auth::id(),


            'offre_id'=>$offre->id,


            'cv'=>$cv,


            'lettre_motivation'=>$request->lettre_motivation,


            'statut'=>'En attente'


        ]);





        return redirect()
        ->route('candidatures.index')
        ->with('success',
        'Votre candidature a été envoyée');



    }




}