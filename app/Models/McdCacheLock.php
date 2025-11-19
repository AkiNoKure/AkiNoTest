<?php

namespace App\Models;

use App\Models\Base\McdCacheLock as BaseMcdCacheLock;

class McdCacheLock extends BaseMcdCacheLock
{
	protected $fillable = [
		'owner',
		'expiration'
	];
}
