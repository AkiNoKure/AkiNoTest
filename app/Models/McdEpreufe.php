<?php

namespace App\Models;

use App\Models\Base\McdEpreufe as BaseMcdEpreufe;

class McdEpreufe extends BaseMcdEpreufe
{
	protected $fillable = [
		'code',
		'nom',
		'score_max',
		'coefficient',
		'commentaire',
		'id_categorie',
		'id_concours'
	];
}
