<?php

namespace App\Models;

use App\Models\Base\McdRole as BaseMcdRole;

class McdRole extends BaseMcdRole
{
	protected $fillable = [
		'code',
		'nom',
		'commentaire'
	];
}
