<?php
namespace Adso\controllers;
use Adso\Libs\Controller;
use Adso\libs\Permission;

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
            "menu"      => true
        ];
        
        $this->view("admin", $data, 'app');
    }
}

