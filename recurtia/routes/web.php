<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OffreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidatureController;



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