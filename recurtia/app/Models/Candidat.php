<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{

    protected $fillable = [
        'user_id',
        'telephone',
        'competences',
        'niveau_etude',
        'cv'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}