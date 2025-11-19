<?php

namespace App\Models;

use App\Models\Base\McdMigration as BaseMcdMigration;

class McdMigration extends BaseMcdMigration
{
	protected $fillable = [
		'migration',
		'batch'
	];
}
