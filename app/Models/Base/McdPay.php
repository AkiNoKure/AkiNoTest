<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdCollege;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdPay
 * 
 * @property string $code
 * @property string $nom
 * @property string|null $commentaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|McdCollege[] $mcd_colleges
 *
 * @package App\Models\Base
 */
class McdPay extends Model
{
	protected $table = 'mcd_pays';
	protected $primaryKey = 'code';
	public $incrementing = false;

	public function mcd_colleges()
	{
		return $this->hasMany(McdCollege::class, 'code_pays');
	}
}
