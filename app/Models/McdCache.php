<?php

namespace App\Models;

use App\Models\Base\McdCache as BaseMcdCache;

class McdCache extends BaseMcdCache
{
	protected $fillable = [
		'value',
		'expiration'
	];
}
