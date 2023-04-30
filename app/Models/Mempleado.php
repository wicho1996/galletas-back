<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mempleado extends Model
{
    function getEmpleados(){
      return $this->db->query("SELECT 
        emp.id_empleado, emp.id_tipo_empleado, emp.nombre, emp.apellido_paterno, emp.apellido_materno, emp.telefono, emp.id_movil, mov.descripcion, emp.estatus, emp.usuario 
        FROM empleado emp
        JOIN movil mov ON emp.id_movil = mov.id_movil AND mov.estatus = 1;
      ");
    }

    function getEmpleado($idEmpleado){
        return $this->db->query("
            SELECT 
            id_empleado, id_tipo_empleado, nombre, apellido_paterno, apellido_materno, telefono, id_movil, estatus, usuario 
            FROM empleado WHERE id_empleado = ?;", 
            [$idEmpleado]
        );
    }

    function addEmpleado($data){
      $data = [
        "nombre" => isset($data->nombre) ? $data->nombre : NULL,
        "apellido_paterno" => isset($data->apellido_paterno) ? $data->apellido_paterno : NULL,
        "apellido_materno" => isset($data->apellido_materno) ? $data->apellido_materno : NULL,
        "telefono" => isset($data->telefono) ? $data->telefono : NULL,
        "id_movil" => isset($data->dispositivo) ? $data->dispositivo->id_movil : NULL,
        "usuario" => isset($data->usuario) ? $data->usuario : NULL,
        "contraseña" => isset($data->contraseña) ? $data->contraseña : 123456,
        "estatus" => isset($data->estatus) ? $data->estatus : 1,
        "fecha_creacion" => date("Y-m-d H:m:s"),
      ];

      $builder = $this->db->table('empleado');

      if (!$builder->insert($data)) return ["estatus" => -1, "mensaje" => 'Error al registrar Empleado'];

      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    function setEmpleado($id_empleado, $data){
      $data = [
        "nombre" => isset($data->nombre) ? $data->nombre : NULL,
        "apellido_paterno" => isset($data->apellido_paterno) ? $data->apellido_paterno : NULL,
        "apellido_materno" => isset($data->apellido_materno) ? $data->apellido_materno : NULL,
        "telefono" => isset($data->telefono) ? $data->telefono : NULL,
        "id_movil" => isset($data->dispositivo) ? $data->dispositivo->id_movil : NULL,
        "usuario" => isset($data->usuario) ? $data->usuario : NULL,
        "estatus" => isset($data->estatus) ? $data->estatus : 1,
        "fecha_creacion" => date("Y-m-d H:m:s"),
      ];
      
      $builder = $this->db->table('empleado');
      $builder->where('id_empleado', $id_empleado);

      if (!$builder->update($data)) return ["estatus" => -1, "mensaje" => 'Error al actualizar el Empleado'];
      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    function delEmpleado($id_empleado){
      $builder = $this->db->table('empleado');
      $builder->where('id_empleado', $id_empleado);

      if (!$builder->delete()) return ["estatus" => -1, "mensaje" => 'Error al borrar el Empelado'];
      return ["estatus" => 1, "mensaje" => 'OK'];
    }

}
