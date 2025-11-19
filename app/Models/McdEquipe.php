<?php

namespace App\Models;

use App\Models\Base\McdEquipe as BaseMcdEquipe;

class McdEquipe extends BaseMcdEquipe
{
	protected $fillable = [
		'code',
		'nom',
		'site',
		'commentaire',
		'id_college'
	];
}
