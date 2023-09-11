<?php

namespace Adso\controllers;

use Adso\Libs\controller;

class RolesController extends Controller{
    
    protected $model;

    function __construct()
    {
        $this->model = $this->model("Roles");
    }

    function index()
    {
        $data = [
            "titulo" => "Roles",
            "subtitulo" => "Formulario roles",
        ];

        $this->view('roles', $data, 'auth');
    }

}