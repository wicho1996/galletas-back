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

    public function getCliente(){
      $Mcliente = model(Mcliente::class);
      $data = json_decode(file_get_contents('php://input'));
      $cliente = $Mcliente->getCliente($data->id_cliente)->getResult();
      echo json_encode($cliente);
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
}
