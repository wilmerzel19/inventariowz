<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
protected $table = 'clientes';


    protected $fillable = [
        'name',
        'cedula',
        'sexo',
        'telefono',
        'direccion',
    ];
    //relacion uno a muchos
    public function ventas(){
        return $this->hasMany('App\Models\Venta');
    }
}
