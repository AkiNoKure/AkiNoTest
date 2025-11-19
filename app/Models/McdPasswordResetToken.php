<?php

namespace App\Models;

use App\Models\Base\McdPasswordResetToken as BaseMcdPasswordResetToken;

class McdPasswordResetToken extends BaseMcdPasswordResetToken
{
	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'token'
	];
}
