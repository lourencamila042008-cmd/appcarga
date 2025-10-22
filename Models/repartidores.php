<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class repartidores extends Model
{
    protected $table = 'repartidores';

    protected $primaryKey = 'id_repartidores';
    
    protected $filable=['nombre','apellido','telefono'];
}
