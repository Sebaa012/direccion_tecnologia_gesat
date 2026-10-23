<?php 

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model{

    protected $table = 'alcaldia_dir.departamentos';
    protected $primaryKey = 'id_departamento';
    protected $allowedFields = [
        'id_departamento',
        'departamento',
    ];
    
    public function getDepartamentos()
    {
        $departamentos = $this->db->table($this->table);
        $departamentos->select('*');
        return $departamentos->get()->getResultArray();
    }

}