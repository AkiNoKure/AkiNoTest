<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdCategory;
use App\Models\McdConcour;
use App\Models\McdScorer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdEpreufe
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $nom
 * @property float|null $score_max
 * @property float|null $coefficient
 * @property string|null $commentaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $id_categorie
 * @property int $id_concours
 * 
 * @property McdCategory $mcd_category
 * @property McdConcour $mcd_concour
 * @property Collection|McdScorer[] $mcd_scorers
 *
 * @package App\Models\Base
 */
class McdEpreufe extends Model
{
	protected $table = 'mcd_epreuves';

	protected $casts = [
		'score_max' => 'float',
		'coefficient' => 'float',
		'id_categorie' => 'int',
		'id_concours' => 'int'
	];

	public function mcd_category()
	{
		return $this->belongsTo(McdCategory::class, 'id_categorie');
	}

	public function mcd_concour()
	{
		return $this->belongsTo(McdConcour::class, 'id_concours');
	}

	public function mcd_scorers()
	{
		return $this->hasMany(McdScorer::class, 'id_epreuve');
	}
}
