<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OffreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\CandidatController;

use App\Http\Controllers\Recruteur\DashboardController as RecruteurDashboardController;
use App\Http\Controllers\Recruteur\OffreController as RecruteurOffreController;
use App\Http\Controllers\Recruteur\CandidatureController as RecruteurCandidatureController;
use App\Http\Controllers\Recruteur\ProfilController as RecruteurProfilController;



/*
|--------------------------------------------------------------------------
| Accueil
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');




/*
|--------------------------------------------------------------------------
| Dashboard candidat
|--------------------------------------------------------------------------
*/

Route::get('/dashboard',
    [OffreController::class,'dashboard']
)
->middleware('auth')
->name('dashboard');





/*
|--------------------------------------------------------------------------
| Offres
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function(){



    Route::get('/offres',
        [OffreController::class,'index']
    )
    ->name('offres.index');



    Route::get('/mes-matchs',
        [OffreController::class,'matchs']
    )
    ->name('matchs.index');



    Route::get('/offres/{id}',
        [OffreController::class,'show']
    )
    ->name('offres.show');





    /*
    |--------------------------------------------------------------------------
    | Candidatures
    |--------------------------------------------------------------------------
    */


    Route::get('/candidatures',
        [CandidatureController::class,'index']
    )
    ->name('candidatures.index');



    Route::post('/offres/{id}/postuler',
        [CandidatureController::class,'store']
    )
    ->name('candidatures.store');



    /*
    |--------------------------------------------------------------------------
    | Profil candidat (téléphone, niveau d'étude, compétences)
    |--------------------------------------------------------------------------
    */

    Route::get('/mon-profil',
        [CandidatController::class,'edit']
    )
    ->name('candidat.profil.edit');

    Route::patch('/mon-profil',
        [CandidatController::class,'update']
    )
    ->name('candidat.profil.update');


});





/*
|--------------------------------------------------------------------------
| Espace recruteur
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'recruteur'])
    ->prefix('recruteur')
    ->name('recruteur.')
    ->group(function () {

        Route::get('/dashboard',
            [RecruteurDashboardController::class, 'index']
        )
        ->name('dashboard');



        // Offres

        Route::get('/offres',
            [RecruteurOffreController::class, 'index']
        )
        ->name('offres.index');

        Route::get('/offres/creer',
            [RecruteurOffreController::class, 'create']
        )
        ->name('offres.create');

        Route::post('/offres',
            [RecruteurOffreController::class, 'store']
        )
        ->name('offres.store');

        Route::get('/offres/{offre}/modifier',
            [RecruteurOffreController::class, 'edit']
        )
        ->name('offres.edit');

        Route::put('/offres/{offre}',
            [RecruteurOffreController::class, 'update']
        )
        ->name('offres.update');

        Route::delete('/offres/{offre}',
            [RecruteurOffreController::class, 'destroy']
        )
        ->name('offres.destroy');



        // Candidatures reçues

        Route::get('/candidatures',
            [RecruteurCandidatureController::class, 'index']
        )
        ->name('candidatures.index');

        Route::get('/candidatures/{candidature}',
            [RecruteurCandidatureController::class, 'show']
        )
        ->name('candidatures.show');

        Route::get('/candidatures/{candidature}/cv',
            [RecruteurCandidatureController::class, 'telechargerCv']
        )
        ->name('candidatures.cv');

        Route::patch('/candidatures/{candidature}/statut',
            [RecruteurCandidatureController::class, 'updateStatut']
        )
        ->name('candidatures.statut');



        // Profil recruteur

        Route::get('/profil',
            [RecruteurProfilController::class, 'edit']
        )
        ->name('profil.edit');

        Route::patch('/profil',
            [RecruteurProfilController::class, 'update']
        )
        ->name('profil.update');

    });




/*
|--------------------------------------------------------------------------
| Profil
|--------------------------------------------------------------------------
*/


Route::middleware('auth')->group(function(){


    Route::get('/profile',
        [ProfileController::class,'edit']
    )
    ->name('profile.edit');



    Route::patch('/profile',
        [ProfileController::class,'update']
    )
    ->name('profile.update');



    Route::delete('/profile',
        [ProfileController::class,'destroy']
    )
    ->name('profile.destroy');


});




require __DIR__.'/auth.php';