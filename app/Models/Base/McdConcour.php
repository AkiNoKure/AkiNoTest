<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdEpreufe;
use App\Models\McdParticiper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdConcour
 * 
 * @property int $id
 * @property string|null $nom
 * @property Carbon|null $date_debut
 * @property Carbon|null $date_fin
 * @property bool|null $actif
 * @property bool|null $en_cours
 * @property string|null $commentaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|McdEpreufe[] $mcd_epreuves
 * @property Collection|McdParticiper[] $mcd_participers
 *
 * @package App\Models\Base
 */
class McdConcour extends Model
{
	protected $table = 'mcd_concours';

	protected $casts = [
		'date_debut' => 'datetime',
		'date_fin' => 'datetime',
		'actif' => 'bool',
		'en_cours' => 'bool'
	];

	public function mcd_epreuves()
	{
		return $this->hasMany(McdEpreufe::class, 'id_concours');
	}

	public function mcd_participers()
	{
		return $this->hasMany(McdParticiper::class, 'id_concours');
	}
}
