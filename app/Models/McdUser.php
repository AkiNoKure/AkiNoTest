<?php

namespace App\Models;

use App\Models\Base\McdUser as BaseMcdUser;

class McdUser extends BaseMcdUser
{
	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];
}
