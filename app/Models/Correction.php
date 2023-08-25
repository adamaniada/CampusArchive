<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Correction extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_examen', 'path','created_at', 'updated_at','deleted_at'];
}
