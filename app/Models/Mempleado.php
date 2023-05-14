<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mempleado extends Model
{
    function getEmpleados(){
      return $this->db->query("SELECT 
        emp.idEmpleado, emp.idTipoEmpleado, emp.nombre, emp.apellidoPaterno, emp.apellidoMaterno, emp.telefono, emp.idMovil, mov.descripcion, emp.estatus, emp.usuario 
        FROM empleado emp
        JOIN movil mov ON emp.idMovil = mov.idMovil AND mov.estatus = 1;
      ");
    }

    function getEmpleado($idEmpleado){
        return $this->db->query("
            SELECT 
            idEmpleado, idTipoEmpleado, nombre, apellidoPaterno, apellidoMaterno, telefono, idMovil, estatus, usuario 
            FROM empleado WHERE idEmpleado = ?;", 
            [$idEmpleado]
        );
    }

    function addEmpleado($data){
      $data = [
        "nombre" => isset($data->nombre) ? $data->nombre : NULL,
        "apellidoPaterno" => isset($data->apellidoPaterno) ? $data->apellidoPaterno : NULL,
        "apellidoMaterno" => isset($data->apellidoMaterno) ? $data->apellidoMaterno : NULL,
        "telefono" => isset($data->telefono) ? $data->telefono : NULL,
        "idMovil" => isset($data->dispositivo) ? $data->dispositivo->idMovil : NULL,
        "usuario" => isset($data->usuario) ? $data->usuario : NULL,
        "contraseña" => isset($data->contraseña) ? $data->contraseña : 123456,
        "estatus" => isset($data->estatus) ? $data->estatus : 1,
        "fecha_creacion" => date("Y-m-d H:m:s"),
      ];

      $builder = $this->db->table('empleado');

      if (!$builder->insert($data)) return ["estatus" => -1, "mensaje" => 'Error al registrar Empleado'];

      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    function setEmpleado($idEmpleado, $data){
      $data = [
        "nombre" => isset($data->nombre) ? $data->nombre : NULL,
        "apellidoPaterno" => isset($data->apellidoPaterno) ? $data->apellidoPaterno : NULL,
        "apellidoMaterno" => isset($data->apellidoMaterno) ? $data->apellidoMaterno : NULL,
        "telefono" => isset($data->telefono) ? $data->telefono : NULL,
        "idMovil" => isset($data->dispositivo) ? $data->dispositivo->idMovil : NULL,
        "usuario" => isset($data->usuario) ? $data->usuario : NULL,
        "estatus" => isset($data->estatus) ? $data->estatus : 1,
        "fecha_creacion" => date("Y-m-d H:m:s"),
      ];
      
      $builder = $this->db->table('empleado');
      $builder->where('idEmpleado', $idEmpleado);

      if (!$builder->update($data)) return ["estatus" => -1, "mensaje" => 'Error al actualizar el Empleado'];
      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    function delEmpleado($idEmpleado){
      $builder = $this->db->table('empleado');
      $builder->where('idEmpleado', $idEmpleado);

      if (!$builder->delete()) return ["estatus" => -1, "mensaje" => 'Error al borrar el Empelado'];
      return ["estatus" => 1, "mensaje" => 'OK'];
    }

}
