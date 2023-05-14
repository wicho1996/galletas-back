<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mtransito extends Model
{
    function getTransitos(){
      return $this->db->query("SELECT * FROM cliente;");
    }

 

 

}
