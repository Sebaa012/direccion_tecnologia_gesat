<?php 
namespace App\Models;
use CodeIgniter\Model;

class AsignateModel extends Model
{
    protected $table = 'bitacoras.asignaciones';
    protected $primaryKey = 'id_asignacion';
    protected $allowedFields = [
        'id_asignacion', 
        'desc_resolucion',
        'conjunto',
        'tecnico', 
        'id_solicitud',
        'fecha_asig',
        'fecha_resol',
        'estado',
        'asignante',
    ];

    protected $createdField = 'fecha_asig';
    protected $updatedField = 'fecha_resol';

    public function setAsignacion($tecnico, $id_solicitud, $asignante)
    {
        $data = [
            'tecnico' => $tecnico,
            'id_solicitud' => $id_solicitud,
            'asignante' => $asignante,
            'estado' => 'ASIGNADO',
            'fecha_asig' => date('Y-m-d H:i:s')
        ];

        return $this->insert($data);
    }
}



?>