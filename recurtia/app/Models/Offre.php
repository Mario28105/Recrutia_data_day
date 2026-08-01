<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidature;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'entreprise',
        'localisation',
    ];

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
}