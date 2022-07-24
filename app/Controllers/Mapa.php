<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Mapa extends Controller
{

    public function getUbicacionesDispositivos(){
      $Mmapa = model(Mmapa::class);
      $ubicaciones = $Mmapa->getUbicacionesDispositivos()->getResult();
      echo json_encode($ubicaciones);
    }
}
