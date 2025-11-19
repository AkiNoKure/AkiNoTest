<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class McdMigration
 * 
 * @property int $id
 * @property string $migration
 * @property int $batch
 *
 * @package App\Models\Base
 */
class McdMigration extends Model
{
	protected $table = 'mcd_migrations';
	public $timestamps = false;

	protected $casts = [
		'batch' => 'int'
	];
}
