<?php

namespace App\Models;

use App\Models\Base\McdParticiper as BaseMcdParticiper;

class McdParticiper extends BaseMcdParticiper
{
	protected $fillable = [
		'commentaire'
	];
}
