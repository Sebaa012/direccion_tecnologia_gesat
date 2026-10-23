<?php 

namespace App\Models;

use CodeIgniter\Model;

class SolicitudModel extends Model
{
    protected $table = 'bitacoras.solicitudes';
    protected $primaryKey = 'id_solicitud';
    protected $allowedFields = [
        'id_solicitud',
        'tipo_solicitud',
        'departamento',
        'oficina',
        'descripcion',
        'nombre_solicitante',
        'telefono',
        'fecha_soli',
        'fecha_res'
    ];

    protected $createdField = 'fecha_soli';
    protected $updatedField = 'fecha_res';


    public function setSolicitud($data){

        $solicitud = $this->db->table($this->table)->insert($data);

        if ($solicitud) {
            return true;
        } else {
            // Log del error
            log_message('error', 'Error al insertar: ' . $this->db->error());
            return false;
        }

    }



}

?>