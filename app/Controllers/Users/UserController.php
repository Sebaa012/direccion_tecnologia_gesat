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
        return redirect()->to('/administration/consult');
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
        if ($this->request->getPost('password') != "" || $this->request->getPost('password') != null) {
            $data = [
                'cedula' => $this->request->getPost('cedula'),
                'nombre_u' => $this->request->getPost('nombre_u'),
                'apellido_u' => $this->request->getPost('apellido_u'),
                'correo_electronico' => $this->request->getPost('correo_electronico'),
                'rol' => $this->request->getPost('rol'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
        } else {
            $data = [
                'cedula' => $this->request->getPost('cedula'),
                'nombre_u' => $this->request->getPost('nombre_u'),
                'apellido_u' => $this->request->getPost('apellido_u'),
                'correo_electronico' => $this->request->getPost('correo_electronico'),
                'rol' => $this->request->getPost('rol'),
            ];
        }


        $this->userModel->update($id_usuario, $data);
        return redirect()->to('administration');
    }

    public function deleteUser($id_usuario)
    {
        $this->userModel->delete($id_usuario);
        return redirect()->to('administration');
    }
}
