<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Dispositivo extends Controller
{
    public function index(){
        return 'Hola Mundo';
    }

    public function getDispositivos(){
      $Mdispositivo = model(Mdispositivo::class);
      $dispositivos = $Mdispositivo->getDispositivos()->getResult();
      echo json_encode($dispositivos);
    }
}
