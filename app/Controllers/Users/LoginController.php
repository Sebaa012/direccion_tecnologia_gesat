<?php

namespace App\Controllers\Users;

use CodeIgniter\Controller;
use App\Models\UserModel;

class LoginController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        helper('form');
        helper('url');
        $this->userModel = new UserModel();
    }

    public function viewLogin()
    {
        return view('Users/UserLogin', ['titulo' => 'Iniciar Sesión']);
    }

    /*public function debugUser()
    {
        $cedula = $this->request->getPost('cedula');
        $password = $this->request->getPost('password');
        if ($cedula == null || $password == null) {
            return redirect()->to('/login?error=1');
        } else {
            $usuario = $this->userModel->login($cedula, $password);
            log_message('debug', 'Controller: Usuario Logueado: ' . json_encode($usuario));
            if ($usuario == null) {
                return redirect()->to('/login?error=2');
            } else if ($usuario != null) {
                echo 'Usuario logueado';
                die();
            }
        }


    }*/

    public function login()
    {
        $cedula = $this->request->getPost('cedula');
        $password = $this->request->getPost('password');
        if ($cedula == null || $password == null) {
            return redirect()->to('/login?error=1');
        } else {
            $usuario = $this->userModel->login($cedula, $password);
            log_message('debug', 'Controller: Usuario Logueado: ' . json_encode($usuario));
            if ($usuario == null) {
                return redirect()->to('/login?error=2');
            } else if ($usuario != null) {
                return redirect()->to('/dashboard');
            }
        }
    }
}
