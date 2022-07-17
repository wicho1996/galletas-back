<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mcliente extends Model
{
    function getClientes(){
      return $this->db->query("SELECT * FROM  cliente;");
    }

}
