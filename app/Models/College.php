<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class College extends Model
{
    protected $table = 'colleges';

    public function equipes()
    {
        return $this->hasMany(Equipe::class, 'id_college');
    }
}
