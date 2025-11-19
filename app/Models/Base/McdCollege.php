<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdEquipe;
use App\Models\McdParticiper;
use App\Models\McdPay;
use App\Models\McdUtilisateur;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdCollege
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $nom
 * @property string|null $adr_ligne_1
 * @property string|null $adr_ligne_2
 * @property string|null $adr_lieu
 * @property string|null $adr_code_postal
 * @property string|null $adr_ville
 * @property string|null $adr_region
 * @property string|null $commentaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $code_pays
 * 
 * @property McdPay $mcd_pay
 * @property Collection|McdEquipe[] $mcd_equipes
 * @property Collection|McdParticiper[] $mcd_participers
 * @property Collection|McdUtilisateur[] $mcd_utilisateurs
 *
 * @package App\Models\Base
 */
class McdCollege extends Model
{
	protected $table = 'mcd_colleges';

	public function mcd_pay()
	{
		return $this->belongsTo(McdPay::class, 'code_pays');
	}

	public function mcd_equipes()
	{
		return $this->hasMany(McdEquipe::class, 'id_college');
	}

	public function mcd_participers()
	{
		return $this->hasMany(McdParticiper::class, 'id_college');
	}

	public function mcd_utilisateurs()
	{
		return $this->hasMany(McdUtilisateur::class, 'id_college');
	}
}
