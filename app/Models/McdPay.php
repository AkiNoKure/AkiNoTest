<?php

namespace App\Models;

use App\Models\Base\McdPay as BaseMcdPay;

class McdPay extends BaseMcdPay
{
	protected $fillable = [
		'nom',
		'commentaire'
	];
}
