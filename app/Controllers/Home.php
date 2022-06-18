<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        return 'Holas';
    }

    public function hola(){
      return 'Hola Wicho';
    }
}
