<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index(){
        return 'Hola Mundo';
    }

    public function getPaginas(){
      $Mlogin = model(Mlogin::class);
      $paginas = $Mlogin->getArbolPaginas();
      
      echo json_encode($paginas);
    }

    public function getEmpleados(){
      $Mlogin = model(Mlogin::class);
      $usuarios = $Mlogin->getEmpleados()->getResult();
      echo json_encode(["estatus" => 0, "mensaje" => "No se logró obtener la información", "usuarios" => $usuarios]);
    }

    public function validarUsuario(){
      $Mlogin = model(Mlogin::class);
      $data = json_decode(file_get_contents('php://input'));
      print_r($data->par1);
      // $users = $Mlogin->getUserByUserName($data);
      echo json_encode(["estatus" => 1, "mensaje" => 'Mensaje acomodado', "data" => ["users" => $users]]);
    }

    public function inciarSesion(){
      $Mlogin = model(Mlogin::class);
      $data = json_decode(file_get_contents('php://input'));
      $validar = $Mlogin->validarUsuario($data->usuario, $data->contraseña);
      echo json_encode($validar);
    }

    public function crearUsuario(){
      $Mlogin = model(Mlogin::class);
      $data = file_get_contents('php://input');
      echo json_encode(["estatus" => 1, "mensaje" => 'Mensaje acomodado', "data" => ["users" => $users]]);
    }
}
