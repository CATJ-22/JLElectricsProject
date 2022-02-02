<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventarioGeneral extends Model
{
    protected $table = 'inventario_general';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nombre', 'cantidad', 'descripcion', 'cantidad_minima'
    ];
}
