<?php

namespace Adso\controllers;

use Adso\Libs\controller;

class UserController extends Controller
{
    protected $model;

    /**Este es el constructor de la clase "UserController". */
    function __construct()
    {
        /**Esto sugiere que el controlador se está comunicando con un modelo llamado "User". */
        $this->model = $this->model("User");
    }

    
    function index()
    {

        $users = $this->model->getUsers();
        $data = [
            "titulo"    => "Users",
            "subtitulo" => "Somos MVC",
            'rows'      => $users
        ];

        // Carga la vista 'USER' con los datos proporcionados y el contexto 'APP'
        $this->view("user", $data, 'app');
    }


}
