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
      $clientes['clientes'] = $Mcliente->getClientes()->getResult();
      echo json_encode($clientes);
    }

    public function getCliente(){
      $Mcliente = model(Mcliente::class);
      $data = json_decode(file_get_contents('php://input'));
      $cliente = $Mcliente->getCliente($data->id_cliente)->getResult();
      echo json_encode($cliente);
    }

    public function getClienteTipos(){
      $Mcliente = model(Mcliente::class);
      $data = json_decode(file_get_contents('php://input'));
      $res['clienteTipos'] = $Mcliente->getClienteTipos()->getResult();
      echo json_encode($res);
    }

    public function addCliente(){
      $Mcliente = model(Mcliente::class);
      $data = json_decode(file_get_contents('php://input'));
      $cliente = $Mcliente->addCliente($data);
      $cliente['clientes'] = $Mcliente->getClientes()->getResult();
      echo json_encode($cliente);
    }

    public function setCliente(){
      $Mcliente = model(Mcliente::class);
      $data = json_decode(file_get_contents('php://input'));
      $cliente = $Mcliente->setCliente($data->id_cliente, $data);
      $cliente['clientes'] = $Mcliente->getClientes()->getResult();
      echo json_encode($cliente);
    }

    public function delCliente(){
      $Mcliente = model(Mcliente::class);
      $data = json_decode(file_get_contents('php://input'));
      $cliente = $Mcliente->delCliente($data->id_cliente);
      $cliente['clientes'] = $Mcliente->getClientes()->getResult();
      echo json_encode($cliente);
    }

    // Mobil  
    public function newCliente(){
      $Mcliente = model(Mcliente::class);
      $data = json_decode(file_get_contents('php://input'));
      $insertar = $Mcliente->insertarTienda($data->tipot, $data->tienda,$data->status, $data->lat, $data->long);
      echo json_encode($insertar);
    }
}
