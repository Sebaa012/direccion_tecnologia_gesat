<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model{
    protected $table = 'bitacoras_dtic.ticket';
    protected $primaryKey = 'id_ticket';
    protected $allowedFields = [
        'id_ticket',
        'cedula_solicitante',
        'id_departamento',
        'id_oficina',
        'id_piso',
        'id_requerimiento',
        'detalle',
        'id_estado',
        'id_prioridad',
        'id_tecnico',
        'fecha_asignacion',
        'fecha_resolucion'
    ];
}
