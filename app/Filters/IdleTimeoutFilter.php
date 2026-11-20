<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class IdleTimeoutFilter implements FilterInterface
{
    protected $userModel;

    public function __construct(){
        $this->userModel = new UserModel();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $time_limit = 10;

        if ($session->has('last_activity')) {
            $time_session = time() - $session->get('last_activity');

            if ($time_session > $time_limit) {
                $this->userModel->logout($session->get('cedula'));
                $session->destroy();
                return redirect()->to('/login');
            }
        }

        $session->set('last_activity', time());
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
