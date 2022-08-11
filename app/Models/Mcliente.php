<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mcliente extends Model
{
    function getClientes(){
      return $this->db->query("SELECT * FROM cliente;");
    }

    function getCliente($idCliente){
      return $this->db->query("SELECT * FROM cliente WHERE id_cliente = ?;", [$idCliente]);
    }

    function addCliente($data){
      $data = [
        "tienda" => isset($data->tienda) ? $data->tienda : NULL,
        "id_tipo_cliente" => isset($data->id_tipo_cliente) ? $data->id_tipo_cliente : NULL,
        "lat" => isset($data->lat) ? $data->lat : NULL,
        "lon" => isset($data->lon) ? $data->lon : NULL,
        "estatus" => isset($data->estatus) ? $data->estatus : NULL,
        "fecha_creacion" => date("Y-m-d H:m:s"),
      ];
      
      $builder = $this->db->table('cliente');

      if (!$builder->insert($data)) ["estatus" => -1, "mensaje" => 'Error al registrar Cliente'];

      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    function setCliente($id_cliente, $data){
      $data = [
        "tienda" => isset($data->tienda) ? $data->tienda : NULL,
        "id_tipo_cliente" => isset($data->id_tipo_cliente) ? $data->id_tipo_cliente : NULL,
        "lat" => isset($data->lat) ? $data->lat : NULL,
        "lon" => isset($data->lon) ? $data->lon : NULL,
        "estatus" => isset($data->estatus) ? $data->estatus : NULL,
        "fecha_creacion" => date("Y-m-d H:m:s"),
      ];
      
      $builder = $this->db->table('cliente');
      $builder->where('id_cliente', $id_cliente);

      if (!$builder->update($data)) ["estatus" => -1, "mensaje" => 'Error al actualizar el Cliente'];
      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    function delCliente($id_cliente){
      $builder = $this->db->table('cliente');
      $builder->where('id_cliente', $id_cliente);

      if (!$builder->delete()) ["estatus" => -1, "mensaje" => 'Error al borrar el Cliente'];
      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    public function insertarTienda($tipot,$tienda,$status,$lat,$long){
  
      $res = $this->db->query("INSERT INTO cliente (id_tipo_cliente, tienda, estatus, fecha_creacion, fecha_modificacion, lat, lon) VALUES (?,?,?,now(),now(),?,?)",[$tipot,$tienda,$status,$lat,$long]);
      return $res;

    }


 

}
