<?php

namespace Adso\controllers;

use Adso\Libs\controller;
use Adso\libs\Session;

class AdminController extends Controller
{
    function __construct()
    {
        // echo "ffffffffffff";
        // die();
    }

    function index(){
        // $sesion = new Session();
        // if($sesion->getLogin()){
            $data = [
                "titulo"    => "Home",
                "subtitulo" => "Saludo del sistema",
                "menu" => true
            ];
            $this->view("admin", $data, 'app');
        // }else{
        //     header('location:'.URL);
        // }
    }
}
