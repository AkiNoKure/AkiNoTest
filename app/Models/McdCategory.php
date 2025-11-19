<?php

namespace App\Models;

use App\Models\Base\McdCategory as BaseMcdCategory;

class McdCategory extends BaseMcdCategory
{
	protected $fillable = [
		'code',
		'nom',
		'commentaire'
	];
}
