<?php

namespace App\Controllers\Solicitudes;

use App\Controllers\BaseController;
use App\Models\SolicitudModel;
use App\Models\DepartmentModel;

class SolicitudController extends BaseController
{
    protected $solicitudModel;
    protected $departmentModel;

    public function __construct()
    {
        $this->solicitudModel = new SolicitudModel();
        $this->departmentModel = new DepartmentModel();
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
        return view('Tickets/TicketsDashboard');
    }
}
