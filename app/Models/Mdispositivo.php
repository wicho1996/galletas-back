<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mdispositivo extends Model
{
    function getDispositivos($estatus = null){
      $where = '';
      if ($estatus !== null) {
        $where = 'WHERE estatus = ' . $estatus;
      }
      return $this->db->query("SELECT * FROM  movil $where;");
    }

    function getDispositivo($idMovil){
      return $this->db->query("SELECT * FROM movil WHERE id_movil = ?;", [$idMovil]);
    }

    function addDispositivo($data){
      $data = [
        "imei" => isset($data->imei) ? $data->imei : NULL,
        "celular" => isset($data->celular) ? $data->celular : NULL,
        "descripcion" => isset($data->descripcion) ? $data->descripcion : NULL,
        "estatus" => isset($data->estatus) ? $data->estatus : 1,
        "fecha_creacion" => date("Y-m-d H:m:s"),
      ];

      $builder = $this->db->table('movil');

      if (!$builder->insert($data)) return ["estatus" => -1, "mensaje" => 'Error al registrar Dispositivo'];

      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    function setDispositivo($id_movil, $data){
      $data = [
        "imei" => isset($data->imei) ? $data->imei : NULL,
        "celular" => isset($data->celular) ? $data->celular : NULL,
        "descripcion" => isset($data->descripcion) ? $data->descripcion : NULL,
        "estatus" => isset($data->estatus) ? $data->estatus : 1,
        "fecha_creacion" => date("Y-m-d H:m:s"),
      ];
      
      $builder = $this->db->table('movil');
      $builder->where('id_movil', $id_movil);

      if (!$builder->update($data)) return ["estatus" => -1, "mensaje" => 'Error al actualizar el Dispositivo'];
      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    function delDispositivo($id_movil){
      $builder = $this->db->table('movil');
      $builder->where('id_movil', $id_movil);

      if (!$builder->delete()) return ["estatus" => -1, "mensaje" => 'Error al borrar el Dispositivo'];
      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    // Movil
    public function updateUbication( $latitud, $longitud, $id){
      $res = $this->db->query("UPDATE movil SET lat = ? , lon = ? WHERE id_movil = ?", [$latitud, $longitud, $id]);
      return $res;
    }
}
