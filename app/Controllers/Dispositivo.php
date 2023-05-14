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
      $data = json_decode(file_get_contents('php://input'));
      $estatusDisp = isset($data->estatusDisp) ? $data->estatusDisp : null;
      $dispositivos = $Mdispositivo->getDispositivos($estatusDisp)->getResult();
      echo json_encode($dispositivos);
    }

    public function getDispositivo(){
      $Mdispositivo = model(Mdispositivo::class);
      $data = json_decode(file_get_contents('php://input'));
      $dispositivo = $Mdispositivo->getDispositivo($data->idMovil)->getResult();
      echo json_encode($dispositivo);
    }

    public function addDispositivo(){
      $Mdispositivo = model(Mdispositivo::class);
      $data = json_decode(file_get_contents('php://input'));
      $dispositivo = $Mdispositivo->addDispositivo($data);
      $dispositivo['dispositivos'] = $Mdispositivo->getDispositivos()->getResult();
      echo json_encode($dispositivo);
    }

    public function setDispositivo(){
      $Mdispositivo = model(Mdispositivo::class);
      $data = json_decode(file_get_contents('php://input'));
      $dispositivo = $Mdispositivo->setDispositivo($data->idMovil, $data);
      $dispositivo['dispositivos'] = $Mdispositivo->getDispositivos()->getResult();
      echo json_encode($dispositivo);
    }

    public function delDispositivo(){
      $Mdispositivo = model(Mdispositivo::class);
      $data = json_decode(file_get_contents('php://input'));
      $dispositivo = $Mdispositivo->delDispositivo($data->idMovil);
      $dispositivo['dispositivos'] = $Mdispositivo->getDispositivos()->getResult();
      echo json_encode($dispositivo);
    }
 
    // Mobil
    public function updateUbication(){
      $Mdispositivo = model(Mdispositivo::class);
      $data = json_decode(file_get_contents('php://input'));
      $update = $Mdispositivo->updateUbication($data->latitud, $data->longitud, $data->id);
      echo json_encode($update);
    }


}
