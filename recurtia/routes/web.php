<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [OffreController::class, 'dashboard'])->name('dashboard');

    Route::get('/offres', [OffreController::class, 'index'])->name('offres.index');
    Route::get('/offres/{id}', [OffreController::class, 'show'])->name('offres.show');
    Route::get('/offres/{id}/postuler', [OffreController::class, 'formPostuler'])->name('offres.postuler.form');

    Route::get('/candidatures', [CandidatureController::class, 'index'])->name('candidatures.index');
    Route::post('/offres/{id}/postuler', [CandidatureController::class, 'store'])->name('candidatures.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('/profile/candidat', [CandidatController::class, 'edit'])->name('candidat.edit');
    Route::post('/profile/candidat', [CandidatController::class, 'update'])->name('candidat.update');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::get('/tarif', function () {
    return view('tarif');
})->name('tarif');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');