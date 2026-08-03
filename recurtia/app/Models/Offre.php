<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidature;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'titre',
        'description',
        'entreprise',
        'localisation',
    ];

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }

    /**
     * Le recruteur qui a publié l'offre
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}