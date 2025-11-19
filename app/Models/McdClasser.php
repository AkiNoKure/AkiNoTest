<?php

namespace App\Models;

use App\Models\Base\McdClasser as BaseMcdClasser;

class McdClasser extends BaseMcdClasser
{
	protected $fillable = [
		'commentaire',
		'score_total'
	];
}
