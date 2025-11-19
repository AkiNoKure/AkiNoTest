<?php

namespace App\Models;

use App\Models\Base\McdGenre as BaseMcdGenre;

class McdGenre extends BaseMcdGenre
{
	protected $fillable = [
		'nom',
		'commentaire'
	];
}
