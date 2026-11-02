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
}
