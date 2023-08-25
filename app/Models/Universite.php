<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Universite extends Model
{
    use SoftDeletes;

    protected $fillable = ['nom', 'designation', 'created_at', 'updated_at','deleted_at'];
}
