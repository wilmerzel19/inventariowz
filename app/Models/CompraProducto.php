<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraProducto extends Model
{
    use HasFactory;

    protected $table = 'compra_producto';

    protected $fillable = [
        'compra_id',
        'producto_id',
        'cantidad',
        'precio',
        'costo',
        'total',
    ];
    //
    public function compra(){
        return $this->belongsTo('App\Models\Compra');
    }

    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }
}
