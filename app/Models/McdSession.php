<?php

namespace App\Models;

use App\Models\Base\McdSession as BaseMcdSession;

class McdSession extends BaseMcdSession
{
	protected $fillable = [
		'user_id',
		'ip_address',
		'user_agent',
		'payload',
		'last_activity'
	];
}
