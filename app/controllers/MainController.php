<?php

namespace Adso\controllers;

use Adso\Libs\controller; // Importa la clase Controller del espacio de nombres Adso\Libs

class MainController extends Controller
{
    function __construct()
    {
    }

    // Constructor de la clase
    function index()
    {
        $data = [
            "titulo"    => "Home",
            "subtitulo" => "Saludo del sistema",
            "menu" => false
        ];
        $this->view("home", $data, 'app');
    }
}
