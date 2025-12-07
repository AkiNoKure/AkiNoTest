<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $table = 'mcd_equipes';
    protected $fillable = [
        'code',
        'nom',
        'site',
        'commentaire',
        'id_concours',
        'id_college',
    ];

    public function college()
    {
        return $this->belongsTo(College::class, 'id_college');
    }

    public function membres()
    {
        return $this->hasMany(Utilisateur::class, 'id_equipe');
    }
}

