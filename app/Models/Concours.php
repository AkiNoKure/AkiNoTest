<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concours extends Model
{
    protected $table = 'concours'; 
    protected $fillable = ['nom', 'date', 'autres_champs'];
}
