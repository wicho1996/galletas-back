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
 
    public function updateUbication(){
      $Mdispositivo = model(Mdispositivo::class);
      $data = json_decode(file_get_contents('php://input'));
      $update = $Mdispositivo->updateUbication($data->latitud, $data->longitud, $data->id);
      echo json_encode($update);
    }


}
