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
 * Class McdGenre
 * 
 * @property string $code
 * @property string|null $nom
 * @property string|null $commentaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|McdUtilisateur[] $mcd_utilisateurs
 *
 * @package App\Models\Base
 */
class McdGenre extends Model
{
	protected $table = 'mcd_genres';
	protected $primaryKey = 'code';
	public $incrementing = false;

	public function mcd_utilisateurs()
	{
		return $this->hasMany(McdUtilisateur::class, 'code_genre');
	}
}
