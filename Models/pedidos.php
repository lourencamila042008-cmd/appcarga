<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    protected $filable=['tipo_vehiculo','paradas','direccion','tipo_paquete'];
}
