<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{

    protected $table = 'autenticacion.usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = [
        'id_usuario',
        'cedula',
        'nombre_u',
        'apellido_u',
        'correo_electronico',
        'password',
        'rol',
        'activo'
    ];
}
