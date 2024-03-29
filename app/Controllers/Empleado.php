<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Empleado extends Controller
{
    public function index(){
        return 'Hola Mundo';
    }

    public function getEmpleados(){
      $Mempleado = model(Mempleado::class);
      $empleados = $Mempleado->getEmpleados()->getResult();
      echo json_encode($empleados);
    }

    public function getEmpleado(){
      $Mempleado = model(Mempleado::class);
      $data = json_decode(file_get_contents('php://input'));
      $empleado = $Mempleado->getEmpleado($data->id_empleado)->getResult();
      echo json_encode($empleado);
    }

    public function addEmpleado(){
      $Mempleado = model(Mempleado::class);
      $data = json_decode(file_get_contents('php://input'));
      $empleado = $Mempleado->addEmpleado($data);
      $empleado['empleados'] = $Mempleado->getEmpleados()->getResult();
      echo json_encode($empleado);
    }

    public function setEmpleado(){
      $Mempleado = model(Mempleado::class);
      $data = json_decode(file_get_contents('php://input'));
      $empleado = $Mempleado->setEmpleado($data->id_empleado, $data);
      $empleado['empleados'] = $Mempleado->getEmpleados()->getResult();
      echo json_encode($empleado);
    }

    public function delEmpleado(){
      $Mempleado = model(Mempleado::class);
      $data = json_decode(file_get_contents('php://input'));
      $empleado = $Mempleado->delEmpleado($data->id_empleado);
      $empleado['empleados'] = $Mempleado->getEmpleados()->getResult();
      echo json_encode($empleado);
    }


}
