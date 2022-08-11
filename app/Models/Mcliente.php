<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mcliente extends Model
{
    function getClientes(){
      return $this->db->query("SELECT * FROM  cliente;");
    }

    public function insertarTienda($tipot,$tienda,$status,$lat,$long){
  
      $res = $this->db->query("INSERT INTO cliente (id_tipo_cliente, tienda, estatus, fecha_creacion, fecha_modificacion, lat, lon) VALUES (?,?,?,now(),now(),?,?)",[$tipot,$tienda,$status,$lat,$long]);
      return $res;

    }


 

}
