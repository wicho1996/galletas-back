<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Cliente extends Controller
{
    public function index(){
        return 'Hola Mundo';
    }

    public function getClientes(){
      $Mcliente = model(Mcliente::class);
      $clientes = $Mcliente->getClientes()->getResult();
      echo json_encode($clientes);
    }
}
