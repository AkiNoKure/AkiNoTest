<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdCollege;
use App\Models\McdEquipe;
use App\Models\McdGenre;
use App\Models\McdRole;
use App\Models\McdUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdUtilisateur
 * 
 * @property int $id
 * @property string $nom
 * @property string|null $prenom
 * @property string|null $classe
 * @property string|null $commentaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $code_genre
 * @property int|null $id_college
 * @property int|null $id_equipe
 * @property int $id_role
 * 
 * @property McdUser $mcd_user
 * @property McdGenre $mcd_genre
 * @property McdCollege|null $mcd_college
 * @property McdEquipe|null $mcd_equipe
 * @property McdRole $mcd_role
 *
 * @package App\Models\Base
 */
class McdUtilisateur extends Model
{
	protected $table = 'mcd_utilisateurs';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'id_college' => 'int',
		'id_equipe' => 'int',
		'id_role' => 'int'
	];

	public function mcd_user()
	{
		return $this->belongsTo(McdUser::class, 'id');
	}

	public function mcd_genre()
	{
		return $this->belongsTo(McdGenre::class, 'code_genre');
	}

	public function mcd_college()
	{
		return $this->belongsTo(McdCollege::class, 'id_college');
	}

	public function mcd_equipe()
	{
		return $this->belongsTo(McdEquipe::class, 'id_equipe');
	}

	public function mcd_role()
	{
		return $this->belongsTo(McdRole::class, 'id_role');
	}
}
