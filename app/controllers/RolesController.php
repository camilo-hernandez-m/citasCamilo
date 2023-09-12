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
            "subtitulo" => "Lista de roles",
        ];

        $roles = $this -> model ->getRoles();

        print_r($roles);
        
        $this->view('roles', $data, 'auth');
    }

}