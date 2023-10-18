<?php

namespace Adso\controllers;

use Adso\Libs\controller;
use Adso\libs\Permisson;

class AdminController extends Controller
{
    function __construct()
    {
        // $sesion = new Permisson();

        // if ($sesion -> ifpermisson(constant('ROLES')['admin'])) {
            
        // }else{
        //     header('location:' . URL . '/login');
        // }
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
