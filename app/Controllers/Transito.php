<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Transito extends Controller
{
    public function index(){
        return 'Hola Mundo';
    }

    public function getTransito(){
      $Mtransito = model(Mtransito::class);
      $transito['transitos'] = $Mtransito->getTransitos()->getResult();
      echo json_encode($clientes);
    }

    
}
