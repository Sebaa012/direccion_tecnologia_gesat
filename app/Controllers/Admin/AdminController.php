<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\AdminModel;
use App\Models\UserModel;

class AdminController extends Controller
{
    protected $adminModel;
    protected $userModel;

    public function __construct()
    {
        helper('form');
        helper('url');
        $this->userModel = new UserModel();
        $this->adminModel = new AdminModel();
    }


    public function userAdministration()
    {
        $data = [
            'titulo' => 'Administración de usuarios',
            'usuarios' => $this->userModel->getUsuario()
        ];
        return view('Admin/UserAdministration', $data);
    }


    public function usuarios()
    {
        $usuario = $this->userModel->getUsuario();
        return view('Admin/UserViews', ['usuarios' => $usuario]);
    }

    public function InsertUser()
    {
        helper(['form', 'url']);

        return view('Admin/UserInsert');
    }

    public function saveUser()
    {
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

    public function viewUpdateUser($id_usuario)
    {
        $usuario = $this->userModel->find($id_usuario);
        $data = [
            'titulo' => 'Actualizar usuario',
            'usuario' => $usuario
        ];
        return view('Admin/UserUpdate', $data);
    }

    public function updateUser($id_usuario)
    {
        $data = [
            'cedula' => $this->request->getPost('cedula'),
            'nombre_u' => $this->request->getPost('nombre_u'),
            'apellido_u' => $this->request->getPost('apellido_u'),
            'correo_electronico' => $this->request->getPost('correo_electronico'),
            'rol' => $this->request->getPost('rol'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];


        $this->userModel->update($id_usuario, $data);
        return redirect()->to('usuarios/administration');
    }
}
