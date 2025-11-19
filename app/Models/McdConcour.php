<?php

namespace App\Models;

use App\Models\Base\McdConcour as BaseMcdConcour;

class McdConcour extends BaseMcdConcour
{
	protected $fillable = [
		'nom',
		'date_debut',
		'date_fin',
		'actif',
		'en_cours',
		'commentaire'
	];
}
