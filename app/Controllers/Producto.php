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

    public function getProducto(){
      $Mproducto = model(Mproducto::class);
      $data = json_decode(file_get_contents('php://input'));
      $producto = $Mproducto->getProducto($data->id_producto)->getResult();
      echo json_encode($producto);
    }

    public function addProducto(){
      $Mproducto = model(Mproducto::class);
      $data = json_decode(file_get_contents('php://input'));
      $producto = $Mproducto->addProducto($data);
      $producto['productos'] = $Mproducto->getProductos()->getResult();
      echo json_encode($producto);
    }

    public function setProducto(){
      $Mproducto = model(Mproducto::class);
      $data = json_decode(file_get_contents('php://input'));
      $producto = $Mproducto->setProducto($data->id_producto, $data);
      $producto['productos'] = $Mproducto->getProductos()->getResult();
      echo json_encode($producto);
    }

    public function delProducto(){
      $Mproducto = model(Mproducto::class);
      $data = json_decode(file_get_contents('php://input'));
      $producto = $Mproducto->delProducto($data->id_producto);
      $producto['productos'] = $Mproducto->getProductos()->getResult();
      echo json_encode($producto);
    }
}
