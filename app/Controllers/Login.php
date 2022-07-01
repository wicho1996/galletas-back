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
      echo json_encode($usuarios);
    }

    public function validarUsuario(){
      $Mlogin = model(Mlogin::class);
      $data = file_get_contents('php://input');
      print_r($data);
      // $users = $Mlogin->getUserByUserName($data);
      echo json_encode(["estatus" => 1, "mensaje" => 'Mensaje acomodado', "data" => ["users" => $users]]);
    }

    public function crearUsuario(){
      $Mlogin = model(Mlogin::class);
      $data = file_get_contents('php://input');
      echo json_encode(["estatus" => 1, "mensaje" => 'Mensaje acomodado', "data" => ["users" => $users]]);
    }
}
