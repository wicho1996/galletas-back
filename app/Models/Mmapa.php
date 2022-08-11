<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mmapa extends Model
{
    public function getUbicacionesDispositivos(){
      return $this->db->query("
        SELECT EMP.id_empleado, EMP.nombre, EMP.apellido_paterno, EMP.apellido_materno, EMP.usuario, MOV.id_Movil, MOV.descripcion, MOV.lat, MOV.lon
        FROM empleado EMP
        JOIN movil MOV ON MOV.id_movil = EMP.id_movil AND MOV.estatus = 1 AND EMP.estatus = 1
      ");
    }

    
 

}
