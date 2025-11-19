<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdEpreufe;
use App\Models\McdEquipe;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdScorer
 * 
 * @property int $id_equipe
 * @property int $id_epreuve
 * @property string|null $commentaire
 * @property float|null $score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property McdEquipe $mcd_equipe
 * @property McdEpreufe $mcd_epreufe
 *
 * @package App\Models\Base
 */
class McdScorer extends Model
{
	protected $table = 'mcd_scorer';
	public $incrementing = false;

	protected $casts = [
		'id_equipe' => 'int',
		'id_epreuve' => 'int',
		'score' => 'float'
	];

	public function mcd_equipe()
	{
		return $this->belongsTo(McdEquipe::class, 'id_equipe');
	}

	public function mcd_epreufe()
	{
		return $this->belongsTo(McdEpreufe::class, 'id_epreuve');
	}
}
