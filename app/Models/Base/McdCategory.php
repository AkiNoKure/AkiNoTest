<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdClasser;
use App\Models\McdEpreufe;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdCategory
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $nom
 * @property string|null $commentaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|McdClasser[] $mcd_classers
 * @property Collection|McdEpreufe[] $mcd_epreuves
 *
 * @package App\Models\Base
 */
class McdCategory extends Model
{
	protected $table = 'mcd_categories';

	public function mcd_classers()
	{
		return $this->hasMany(McdClasser::class, 'id_categorie');
	}

	public function mcd_epreuves()
	{
		return $this->hasMany(McdEpreufe::class, 'id_categorie');
	}
}
