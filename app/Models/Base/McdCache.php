<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class McdCache
 * 
 * @property string $key
 * @property string $value
 * @property int $expiration
 *
 * @package App\Models\Base
 */
class McdCache extends Model
{
	protected $table = 'mcd_cache';
	protected $primaryKey = 'key';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'expiration' => 'int'
	];
}
