<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        "user_id",
        "nom_complet",
        "secteur",
        "niveau_etude",
        "localisation",
        "telephone",
        "bio",
        "photo_path",
        "categorie",
        "statut",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
