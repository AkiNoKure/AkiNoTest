<?php

namespace App\Models;

use App\Models\Base\McdScorer as BaseMcdScorer;

class McdScorer extends BaseMcdScorer
{
	protected $fillable = [
		'commentaire',
		'score'
	];
}
