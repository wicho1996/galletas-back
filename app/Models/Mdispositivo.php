<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mdispositivo extends Model
{
    function getDispositivos(){
      return $this->db->query("SELECT * FROM  movil;");
    }


    public function updateUbication( $latitud, $longitud, $id){
      $res = $this->db->query("UPDATE movil SET lat = ? , lon = ? WHERE id_movil = ?", [$latitud, $longitud, $id]);
      return $token;
    }
}
