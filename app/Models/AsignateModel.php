<?php 
namespace App\Models;
use CodeIgniter\Model;

class AsignateModel extends Model
{
    protected $table = 'bitacoras.asignaciones';
    protected $table_2 = 'bitacoras.solicitudes';
    protected $primaryKey = 'id_asignacion';


    protected $allowedFields = [
        'tecnico',
        'id_solicitud',
        'asignante',
        'estado',
        'fecha_asig'
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

    public function getAsignaciones($id_tecnico){
    
        $misAsignaciones = $this->db->query(
            "SELECT a.id_asignacion, s.id_solicitud, s.tipo_solicitud, s.departamento, s.piso, s.nombre_solicitante, s.descripcion, s.fecha_soli/*, (SELECT CONCAT(nombre_u, ' ', apellido_u) FROM {table} WHERE id_usuario = a.asignante) AS asignante*/
            FROM {$this->table} a INNER JOIN {$this->table_2} s ON a.id_solicitud = s.id_solicitud 
            WHERE a.tecnico = ? AND s.estado = 'EN ATENCIÓN' ORDER BY s.fecha_soli ASC", [$id_tecnico])->getResultArray();
        
        return $misAsignaciones;

    }

    public function updateAsignacion($id_asignacion, $data)
    {
        if($data['cont'] == '1'){
            $updateAsignacion = $this->db->query("UPDATE {$this->table} SET estado = ?,  desc_resolucion = ?, fecha_resol = ?  WHERE id_solicitud = ?",[$data['estado'], $data['desc_resolucion'], $data['fecha_res'], $id_asignacion]);
        }else if($data['cont'] == '0'){
            $updateAsignacion = $this->db->query("UPDATE {$this->table} SET estado = ?,  desc_resolucion = ?, fecha_esc = ?  WHERE id_solicitud = ?",[$data['estado'], $data['desc_resolucion'], $data['fecha_esc'], $id_asignacion]);

        }
        
        return $updateAsignacion;
    }
}





?>