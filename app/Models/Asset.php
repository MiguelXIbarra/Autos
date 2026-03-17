<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';
    protected $primaryKey = 'id_asset';
    protected $fillable = ['titulo', 'tipo', 'ruta', 'estatus'];
}