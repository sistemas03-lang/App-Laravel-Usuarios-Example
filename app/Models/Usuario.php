<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'IdUsuario';

    // MUY IMPORTANTE PARA TU CASO:
    public $timestamps = false;   // <- agrega esta línea

    protected $fillable = [
        'NombreUsuario',
    ];
}
