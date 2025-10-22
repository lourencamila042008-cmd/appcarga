<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_clientes';
    protected $filable=['nombre','apellido','telefono','correo'];
}
