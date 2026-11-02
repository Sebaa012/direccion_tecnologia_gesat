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

    public function getUser($id_usuario)
    {
        return $this->find($id_usuario);
    }

    public function updateUser($id_usuario, $data)
    {
        return $this->update($id_usuario, $data);
    }

    public function deleteUser($id_usuario)
    {
        return $this->delete($id_usuario);
    }
}
