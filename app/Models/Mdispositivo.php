<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mdispositivo extends Model
{
    function getDispositivos(){
      return $this->db->query("SELECT * FROM  movil;");
    }

}
