<?php

namespace App\Models;

use App\Models\Base\McdUtilisateur as BaseMcdUtilisateur;

class McdUtilisateur extends BaseMcdUtilisateur
{
    protected $table = 'mcd_utilisateurs';

    protected $fillable = [
        'nom',
        'prenom',
        'classe',
        'commentaire',
        'code_statut',
        'code_genre',
        'id_college',
        'id_equipe'
    ];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'id_equipe');
    }
}

