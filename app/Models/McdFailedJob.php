<?php

namespace App\Models;

use App\Models\Base\McdFailedJob as BaseMcdFailedJob;

class McdFailedJob extends BaseMcdFailedJob
{
	protected $fillable = [
		'uuid',
		'connection',
		'queue',
		'payload',
		'exception',
		'failed_at'
	];
}
