<?php

namespace Adso\controllers;

use Adso\Libs\controller;

class RolesController extends Controller{
    
    protected $model;

    function __construct()
    {
        $this->model = $this->model("Role");
    }

    function index()
    {
        $roles = $this -> model ->getRoles();

        $data = [
            "titulo" => "Roles",
            "subtitulo" => "Lista de roles",
            "roles" => $roles
        ];
        
        $this->view('rol/index', $data, 'auth');
    }

    function create(){
        
            $data = [
                "titulo" => "Roles",
                "subtitulo" => "Creacion de roles",
            ];

            $this -> view("rol/create", $data, "auth");
        
    }

    function storage(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $errores = [];
            $roles = $_POST['rol_name'];

            if($roles == ""){
                $errores["rol_error"] = "el rol esta vacio";
            }
            if(strlen( $roles) > 50 ){
                $errores["rol_error"] = "el rol supera el limite de caracteres";
            }
            
            if(empty($errores)){

                $valores = [
                    "name_role" => $roles 
                ];

                $this -> model -> storage($valores);

                $data = [
                    "titulo" => "Roles",
                    "subtitulo" => "Lista de roles",
                    "roles" => $roles
                ];

                $roles = $this -> model ->getRoles();
                
                $this->view('rol/index', $data, 'auth');

            }else{
                $data = [
                    "titulo" => "Roles",
                    "subtitulo" => "Creacion de roles",
                ];
    
                $this -> view("rol/create", $data, "auth");
            }
        }else{

        }
    }

    function editar($id){

        $save = $this -> model -> getRole($id);

        $data = [
            "titulo" => "Roles",
            "subtitulo" => "Actualizacion de roles",
            "data" => $save
        ];

        $this -> view("rol/update", $data, "auth");
    }

    function update(){
        
        
    }

}