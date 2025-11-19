<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class McdJob
 * 
 * @property int $id
 * @property string $queue
 * @property string $payload
 * @property int $attempts
 * @property int|null $reserved_at
 * @property int $available_at
 * @property int $created_at
 *
 * @package App\Models\Base
 */
class McdJob extends Model
{
	protected $table = 'mcd_jobs';
	public $timestamps = false;

	protected $casts = [
		'attempts' => 'int',
		'reserved_at' => 'int',
		'available_at' => 'int'
	];
}
