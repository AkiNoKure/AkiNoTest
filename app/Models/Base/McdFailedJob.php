<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdFailedJob
 * 
 * @property int $id
 * @property string $uuid
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property Carbon $failed_at
 *
 * @package App\Models\Base
 */
class McdFailedJob extends Model
{
	protected $table = 'mcd_failed_jobs';
	public $timestamps = false;

	protected $casts = [
		'failed_at' => 'datetime'
	];
}
