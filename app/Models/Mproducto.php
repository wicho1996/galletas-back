<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mproducto extends Model
{
    function getProductos(){
      return $this->db->query("SELECT * FROM  producto;");
    }

    function getProducto($idProducto){
      return $this->db->query("SELECT * FROM producto WHERE idProducto = ?;", [$idProducto]);
    }

    function addProducto($data){
      $data = [
        "nombre" => isset($data->nombre) ? $data->nombre : NULL,
        "costo" => isset($data->costo) ? $data->costo : NULL,
        "estatus" => isset($data->estatus) ? $data->estatus : 1,
        "fecha_creacion" => date("Y-m-d H:m:s"),
      ];

      $builder = $this->db->table('producto');

      if (!$builder->insert($data)) return ["estatus" => -1, "mensaje" => 'Error al registrar Producto'];

      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    function setProducto($idProducto, $data){
      $data = [
        "nombre" => isset($data->nombre) ? $data->nombre : NULL,
        "costo" => isset($data->costo) ? $data->costo : NULL,
        "estatus" => isset($data->estatus) ? $data->estatus : NULL,
        "fecha_creacion" => date("Y-m-d H:m:s"),
      ];
      
      $builder = $this->db->table('producto');
      $builder->where('idProducto', $idProducto);

      if (!$builder->update($data)) return ["estatus" => -1, "mensaje" => 'Error al actualizar el Producto'];
      return ["estatus" => 1, "mensaje" => 'OK'];
    }

    function delProducto($idProducto){
      $builder = $this->db->table('producto');
      $builder->where('idProducto', $idProducto);

      if (!$builder->delete()) return ["estatus" => -1, "mensaje" => 'Error al borrar el Producto'];
      return ["estatus" => 1, "mensaje" => 'OK'];
    }

}
