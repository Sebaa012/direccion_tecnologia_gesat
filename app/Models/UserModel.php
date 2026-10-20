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

    public function login($cedula, $password)
    {
        if($cedula == null || $password == null){
            return false;
        }


        $hash_password = $this->db->query("SELECT password FROM $this->table WHERE cedula = '$cedula'")->getRowArray();

        $hash_password = $hash_password['password'];

        $usuario = $this->db->query("SELECT cedula,nombre_u,apellido_u,correo_electronico,rol FROM $this->table WHERE cedula = '$cedula'")->getRowArray();

        log_message('debug', 'Usuario: ' . json_encode($usuario));
        //die();
        if(empty($usuario)){
            return false;
        }

        if(password_verify($password, $hash_password)){
            return $usuario;
        }

        //return false;

    }
}
