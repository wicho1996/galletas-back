<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Producto extends Controller
{
    public function index(){
        return 'Hola Mundo';
    }

    public function getProductos(){
      $Mproducto = model(Mproducto::class);
      $productos = $Mproducto->getProductos()->getResult();
      echo json_encode($productos);
    }
}
