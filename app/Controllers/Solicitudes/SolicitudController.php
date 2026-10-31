<?php

namespace App\Controllers\Solicitudes;

use App\Controllers\BaseController;
use App\Models\SolicitudModel;
use App\Models\DepartmentModel;
use App\Models\UserModel;

class SolicitudController extends BaseController
{
    protected $solicitudModel;
    protected $departmentModel;
    protected $userModel;

    public function __construct()
    {
        $this->solicitudModel = new SolicitudModel();
        $this->departmentModel = new DepartmentModel();
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }
    public function solicitudes()
    {
        $departamentos = $this->departmentModel->getDepartamentos();
        return view('Solicitudes/SolicitudPersona', ['departamentos' => $departamentos]);
    }

    public function setSolicitud()
    {
        if($this->request->is('post')){
            //$data = $this->request->getPost();
            $data = [
                'tipo_solicitud' => $this->request->getPost('tipo_solicitud'),
                'departamento' => $this->request->getPost('departamento'),
                'piso' => $this->request->getPost('piso'),
                'nombre_solicitante' => $this->request->getPost('nombre_solicitante'),
                'telefono' => $this->request->getPost('telefono'),
                'descripcion' => $this->request->getPost('descripcion'),
                'fecha_soli' => date('Y-m-d H:i:s')
            ];
            $this->solicitudModel->setSolicitud($data);
            return redirect()->to('/solicitudes?solicitud=1');
        }
        return redirect()->to('/solicitudes?error=1');
    }

    public function dashboard()
    {
        $usuarios = $this->userModel->findAll();
        //$solicitudes = $this->solicitudModel->getSolicitudes();
        $usuarios = $this->userModel->getTecnicos();
        return view('Tickets/TicketsDashboard', ['titulo' => 'Dashboard', 'usuarios' => $usuarios]);
    }

    public function listarTicketsAjax()
    {
        $solicitudes = $this->solicitudModel->getSolicitudes();
        return $this->response->setJSON($solicitudes);
    }

    public function atenderTicketsAjax()
    {
        $id = $this->request->getPost('id_solicitud');
        if(!$id){
            return $this->response->setJSON(['status' => 'error', 'message' => 'Error al atender el ticket']);
        }
        $data = [
            'estado' => 'EN ATENCIÓN',
            'fecha_res' => date('Y-m-d H:i:s')
        ];
        $this->solicitudModel->setSolicitud($data);
        return $this->response->setJSON(['status' => 'success', 'message' => 'Ticket atendido correctamente']);
        
    }

    
}
