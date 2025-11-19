<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = [

		'code',
		'nom',
		'site',
		'commentaire',
		'id_concours',
		'id_college'
	];
}
