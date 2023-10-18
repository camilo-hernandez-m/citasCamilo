<?php

namespace Adso\controllers;

use Adso\libs\Controller;

class PermissonController extends Controller
{

    protected $model = "";

    function __construct()
    {

        $this->model = $this->model('Permisson');
    }

    function index()
    {
        $permisos = $this->model->getPermisson();

        $data = [
            "titulo" => "permisos",
            "subtitulo" => "Lista de permisos",
            "permisos" => $permisos
        ];

        $this->view('permisson/index', $data, 'auth');
    }

    function create()
    {
        $data = [
            "titulo" => "permisos",
            "subtitulo" => "Crear un permisos"
        ];

        $this->view('permisson/create', $data, 'auth');
    }

    function storage()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = array();
            $permiso = $_POST['per_name'];

            if ($permiso == "") {
                $errors['per_error'] = "el campo esta vacio";
            }

            if (strlen($permiso) > 50) {
                $errors['per_error'] = "el permiso supera el limite de caracteres";
            }

            if (empty($errors)) {

                $valores = [
                    "name_permisson" => $permiso
                ];

                $this->model->storage($valores);

                header("Location: " . URL . "/permisson");
            } else {
                $data = [
                    "titulo" => "permisos",
                    "subtitulo" => "Crear un permisos",
                    "errors" => $errors
                ];

                $this->view('permisson/create', $data, 'auth');
            }
        }
    }

    function editar($id)
    {

        $param = $this -> model -> getId($id);

        $data = [
            "titulo" => "permisos",
            "subtitulo" => "editar un permisos"
        ];

        $this->view('permisson/update', $data, 'auth');
    }
}
