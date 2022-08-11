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

    public function newCliente(){
      $Mcliente = model(Mcliente::class);
      $data = json_decode(file_get_contents('php://input'));
      $insertar = $Mcliente->insertarTienda($data->tipot, $data->tienda,$data->status, $data->lat, $data->long);
      echo json_encode($insertar);
    }
}
