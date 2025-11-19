<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdCategory;
use App\Models\McdEquipe;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdClasser
 * 
 * @property int $id_equipe
 * @property int $id_categorie
 * @property string|null $commentaire
 * @property float|null $score_total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property McdEquipe $mcd_equipe
 * @property McdCategory $mcd_category
 *
 * @package App\Models\Base
 */
class McdClasser extends Model
{
	protected $table = 'mcd_classer';
	public $incrementing = false;

	protected $casts = [
		'id_equipe' => 'int',
		'id_categorie' => 'int',
		'score_total' => 'float'
	];

	public function mcd_equipe()
	{
		return $this->belongsTo(McdEquipe::class, 'id_equipe');
	}

	public function mcd_category()
	{
		return $this->belongsTo(McdCategory::class, 'id_categorie');
	}
}
