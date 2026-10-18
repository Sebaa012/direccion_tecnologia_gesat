<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
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
        'rol'
    ];


    public function getUsuario()
    {
        $usuario = $this->db->query("SELECT * FROM $this->table")->getResultArray();
        return $usuario;
    }

    public function setUsuario($data)
    {
        $this->db->table($this->table)->insert($data);
    }
}
