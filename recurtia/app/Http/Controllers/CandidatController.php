<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidat;

class CandidatController extends Controller
{

    public function edit()
    {
        $candidat = Auth::user()->candidat;

        return view('profile.candidat', compact('candidat'));
    }


    public function update(Request $request)
    {

        $request->validate([
            'telephone'=>'nullable',
            'competences'=>'nullable',
            'niveau_etude'=>'nullable',
        ]);


        Candidat::updateOrCreate(

            [
                'user_id'=>Auth::id()
            ],

            [
                'telephone'=>$request->telephone,
                'competences'=>$request->competences,
                'niveau_etude'=>$request->niveau_etude,
            ]

        );


        return redirect()
            ->back()
            ->with('success','Profil mis à jour');

    }

}