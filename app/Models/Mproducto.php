<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Mproducto extends Model
{
    function getProductos(){
      return $this->db->query("SELECT * FROM  producto;");
    }

}
