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

}