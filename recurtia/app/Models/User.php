<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;


    /**
     * Les champs modifiables
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];


    /**
     * Les champs cachés
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    /**
     * Conversion des types
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    /**
     * Un utilisateur possède plusieurs candidatures
     */
    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }

    public function candidat()
    {
         return $this->hasOne(Candidat::class);
    }

    /**
     * Un utilisateur recruteur possède un profil recruteur
     */
    public function recruteur()
    {
        return $this->hasOne(Recruteur::class);
    }

    /**
     * Un recruteur possède plusieurs offres publiées
     */
    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

    /**
     * Vérifie si l'utilisateur est un recruteur
     */
    public function isRecruteur(): bool
    {
        return $this->role === 'recruteur';
    }

    /**
     * Vérifie si l'utilisateur est un candidat
     */
    public function isCandidat(): bool
    {
        return $this->role === 'candidat';
    }

}