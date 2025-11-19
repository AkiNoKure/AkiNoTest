<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdCollege;
use App\Models\McdConcour;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdParticiper
 * 
 * @property int $id_college
 * @property int $id_concours
 * @property string|null $commentaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property McdCollege $mcd_college
 * @property McdConcour $mcd_concour
 *
 * @package App\Models\Base
 */
class McdParticiper extends Model
{
	protected $table = 'mcd_participer';
	public $incrementing = false;

	protected $casts = [
		'id_college' => 'int',
		'id_concours' => 'int'
	];

	public function mcd_college()
	{
		return $this->belongsTo(McdCollege::class, 'id_college');
	}

	public function mcd_concour()
	{
		return $this->belongsTo(McdConcour::class, 'id_concours');
	}
}
