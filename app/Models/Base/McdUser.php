<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\McdUtilisateur;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class McdUser
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property McdUtilisateur|null $mcd_utilisateur
 *
 * @package App\Models\Base
 */
class McdUser extends Model
{
	protected $table = 'mcd_users';

	protected $casts = [
		'email_verified_at' => 'datetime'
	];

	public function mcd_utilisateur()
	{
		return $this->hasOne(McdUtilisateur::class, 'id');
	}
}
