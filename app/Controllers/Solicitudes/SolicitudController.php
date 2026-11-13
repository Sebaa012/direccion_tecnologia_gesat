<?php

namespace App\Controllers\Solicitudes;

use App\Controllers\BaseController;
use App\Models\SolicitudModel;
use App\Models\DepartmentModel;
use App\Models\UserModel;
use App\Models\AsignateModel;

class SolicitudController extends BaseController
{
    protected $solicitudModel;
    protected $departmentModel;
    protected $userModel;
    protected $asignateModel;

    public function __construct()
    {
        $this->solicitudModel = new SolicitudModel();
        $this->departmentModel = new DepartmentModel();
        $this->userModel = new UserModel();
        $this->asignateModel = new AsignateModel();
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

    public function setSolicitudResolucion()
    {
        if($this->request->is('post')){
            $id_solicitud = $this->request->getPost('id_solicitud');
            $data = [
                'estado' => 'EN RESOLUCIÓN',            ];
            $this->solicitudModel->setSolicitudResolucion($id_solicitud, $data);
            return true;
        }
        return redirect()->to('/dashboard?error=1');
    }

    public function dashboard()
    {
        $usuarios = $this->userModel->findAll();
        //$solicitudes = $this->solicitudModel->getSolicitudes();
        $usuarios = $this->userModel->getUsuario();
        return view('Tickets/TicketsDashboard', ['titulo' => 'Dashboard', 'usuarios' => $usuarios]);
    }

    public function listarTicketsAjax()
    {
        $solicitudes = $this->solicitudModel->getSolicitudes();
        return $this->response->setJSON($solicitudes);
    }

    public function asignarTicketsAjax()
    {
        $idSolicitud = $this->request->getPost('id_solicitud');
        $idUsuarios  = $this->request->getPost('id_usuario');
        $idUsuarios  = is_array($idUsuarios) ? $idUsuarios : [$idUsuarios];
        $idUsuarios  = array_values(array_filter(array_map('intval', $idUsuarios)));

        if (empty($idSolicitud) || $idUsuarios === []) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Debe seleccionar al menos un técnico.',
                'csrf_hash' => csrf_hash(),
            ]);
        }

        $data = [
            'estado' => 'EN ATENCIÓN',
            'fecha_res' => date('Y-m-d H:i:s')
        ];
        $this->solicitudModel->setSolicitudResolucion($idSolicitud, $data);

        foreach ($idUsuarios as $idUsuario) {
            $this->asignateModel->setAsignacion($idUsuario, $idSolicitud, session()->get('id_usuario'));
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Ticket en atención',
            'asignados' => $idUsuarios,
            'csrf_hash' => csrf_hash(),
        ]);
    }

    public function misTickets()
    {
        $id_usuario = session('id_usuario');
        $solicitudes = $this->asignateModel->getAsignaciones($id_usuario);
        return view('Tickets/MisTickets', ['titulo' => 'Tickets Pendientes', 'solicitudes' => $solicitudes]);
    }

     public function ticketsPendientes()
    {
        $id_usuario = session('id_usuario');
        $solicitudes = $this->asignateModel->getAsignaciones($id_usuario);
        return view('Tickets/MisTickets', ['titulo' => 'Tickets Pendientes', 'solicitudes' => $solicitudes]);
    }


    public function resolveTicket($id_ticket){
    //var_dump($id_ticket);die();    
    if (!empty($id_ticket)) {
            $data = [
                'estado' => 'RESUELTO',
                'fecha_res' => date('Y-m-d H:i:s'),
                'desc_resolucion' => $this->request->getpost('descripcion'),
                'cont' => '1'
            ];
            $this->solicitudModel->setSolicitudResolucion($id_ticket, $data);
            $this->asignateModel->updateAsignacion($id_ticket, $data);
            return redirect()->to('/tickets/pendientes?resolved=1');
        }
    }

    public function escalarTicket($id_ticket){
        //var_dump($this->request->getpost('descripcion_ur')); die();
        if (!empty($id_ticket)) {
            $data = [
                'estado' => 'NO RESUELTO',
                'fecha_esc' => date('Y-m-d H:i:s'),
                'desc_resolucion' => $this->request->getpost('descripcion_ur'),
                'cont' => '0'
            ];
            $this->solicitudModel->setSolicitudResolucion($id_ticket, $data);
            $this->asignateModel->updateAsignacion($id_ticket, $data);
            return redirect()->to('/tickets/pendientes?escalated=1');
        }
    }
}
