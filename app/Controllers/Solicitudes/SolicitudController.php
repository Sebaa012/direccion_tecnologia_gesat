<?php

namespace App\Controllers\Solicitudes;

use App\Controllers\BaseController;
use App\Models\SolicitudModel;

class SolicitudController extends BaseController
{
    protected $solicitudModel;

    public function __construct()
    {
        $this->solicitudModel = new SolicitudModel();
        helper(['form', 'url']);
    }
    public function solicitudes()
    {
        return view('Solicitudes/SolicitudPersona');
    }

    public function dashboard()
    {
        return view('Tickets/TicketsDashboard');
    }
}
