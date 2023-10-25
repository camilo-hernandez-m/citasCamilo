<?php

namespace Adso\controllers;

use Adso\Libs\controller;
use Adso\libs\Permisson;

/**
 * Clase AdminController
 * 
 * Esta clase reprensenta el controlador 
 * 
 * 
 */
class AdminController extends Controller
{
    function __construct()
    {

    }
    function index()
    {
        $data = [
            "titulo"    => "Home",
            "subtitulo" => "Saludo del sistema",
            "menu" => true
        ];
        $this->view("admin", $data, 'app');
    }
}
