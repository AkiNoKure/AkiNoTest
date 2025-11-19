<?php

namespace App\Models;

use App\Models\Base\McdJob as BaseMcdJob;

class McdJob extends BaseMcdJob
{
	protected $fillable = [
		'queue',
		'payload',
		'attempts',
		'reserved_at',
		'available_at'
	];
}
