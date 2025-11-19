<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdClasser;
use App\Models\McdCollege;
use App\Models\McdScorer;
use App\Models\McdUtilisateur;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdEquipe
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $nom
 * @property string|null $site
 * @property string|null $commentaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $id_college
 * 
 * @property McdCollege $mcd_college
 * @property Collection|McdClasser[] $mcd_classers
 * @property Collection|McdScorer[] $mcd_scorers
 * @property Collection|McdUtilisateur[] $mcd_utilisateurs
 *
 * @package App\Models\Base
 */
class McdEquipe extends Model
{
	protected $table = 'mcd_equipes';

	protected $casts = [
		'id_college' => 'int'
	];

	public function mcd_college()
	{
		return $this->belongsTo(McdCollege::class, 'id_college');
	}

	public function mcd_classers()
	{
		return $this->hasMany(McdClasser::class, 'id_equipe');
	}

	public function mcd_scorers()
	{
		return $this->hasMany(McdScorer::class, 'id_equipe');
	}

	public function mcd_utilisateurs()
	{
		return $this->hasMany(McdUtilisateur::class, 'id_equipe');
	}
}
