<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoVenta extends Model
{
    use HasFactory;

    protected $table = 'producto_venta';

    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'precio',
        'costo',
        'total',
    ];
    //relation
    public function venta(){
        return $this->belongsTo('App\Models\Venta');
    }

    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
}
