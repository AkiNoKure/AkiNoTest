<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdUtilisateur;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdRole
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $nom
 * @property string|null $commentaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|McdUtilisateur[] $mcd_utilisateurs
 *
 * @package App\Models\Base
 */
class McdRole extends Model
{
	protected $table = 'mcd_roles';

	public function mcd_utilisateurs()
	{
		return $this->hasMany(McdUtilisateur::class, 'id_role');
	}
}
