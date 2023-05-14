<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mmapa extends Model
{
    public function getUbicacionesDispositivos(){
      return $this->db->query("
        SELECT EMP.idEmpleado, EMP.nombre, EMP.apellidoPaterno, EMP.apellidoMaterno, EMP.usuario, MOV.idMovil, MOV.descripcion, MOV.lat, MOV.lon
        FROM empleado EMP
        JOIN movil MOV ON MOV.idMovil = EMP.idMovil AND MOV.estatus = 1 AND EMP.estatus = 1
      ");
    }

    
 

}
