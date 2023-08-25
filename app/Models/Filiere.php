<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filiere extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_univ', 'id_ufr', 'nom', 'designation', 'created_at', 'updated_at','deleted_at'];
}
