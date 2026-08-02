<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruteur extends Model
{

    protected $fillable = [
        'user_id',
        'entreprise',
        'poste',
        'telephone',
        'site_web',
        'description_entreprise',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
