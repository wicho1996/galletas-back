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
      $Mlogin = model(Mdispositivo::class);
      $data = file_get_contents('php://input');
      echo json_encode(["estatus" => 1, "mensaje" => 'Mensaje acomodado', "data" => ["users" => $users]]);
    }


}
