<?php

namespace App\Controllers\Users;

use CodeIgniter\Controller;
use App\Models\UserModel;


class UserController extends Controller
{
    protected $helpers = ['form', 'url'];
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function usuarios()
    {
        $usuario = $this->userModel->getUsuario();
        return view('Users/UserViews', ['usuarios' => $usuario]);
    }

    public function InsertUser()
    {
        helper(['form', 'url']);

        return view('Users/UserInsert');
    }


    public function saveUser(){
        $data = [
            'cedula' => $this->request->getPost('cedula'),
            'nombre_u' => $this->request->getPost('nombre_u'),
            'apellido_u' => $this->request->getPost('apellido_u'),
            'correo_electronico' => $this->request->getPost('correo_electronico'),
            'rol' => $this->request->getPost('rol'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];


        $this->userModel->insert($data);
        return redirect()->to('/usuarios');



    }
}
