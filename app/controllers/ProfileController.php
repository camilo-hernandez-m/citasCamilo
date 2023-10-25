<?php

namespace Adso\controllers;

use Adso\libs\Controller;
use Adso\libs\Session;
use Adso\model\ImagenModel;

class ProfileController extends Controller{
    protected $model;

    function __construct(){
        $this->model = $this->model("Profile");
    }

    function index(){
        if(!file_exists("assets/resourse")){
            mkdir("assets/resourse", 0777, true);
        }
        $data = [
            'Titulo' => 'Perfiles',
            'subtitulos' => 'actualizar perfil',
        ];

        $this -> view('profile/update', $data, 'auth');
    }

    function update(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $errores = [];
            
            $file = $_FILES["fichero"]["name"];
            $url_temp = $_FILES["fichero"]["tmp_name"];
            $file_size = floor($_FILES["fichero"]["size"] / 1024);
            $file_type = ($_FILES["fichero"]["tmp_name"] != null) ? mime_content_type($_FILES["fichero"]["tmp_name"]) : "";

            if($file == null){
                $errores['error_file'] = "por favor seleccione un archivo";
            }

            if ( $file_size > 5120) {
                $errores['error_size'] = "el archivo es muy pesado";
            }

            if($file_type != "image/jpg" && $file_type != "image/jpeg" && $file_type != "image/png" ) {
                $errores['error_type'] = "el archivo tiene formato no permitido";
            }

            $url_insert = dirname(__FILE__,3)."\\public\\assets\\resourse\\";

            // die($url_insert);
            if(empty($errores)){
                chmod( $url_insert, 0777);

                if (move_uploaded_file($url_temp, $url_insert.$file)) {

                    $sesion = new Session();
        
                    $id_user = $sesion->getUser()['id_user'];
            
                    $valores = ['user_id ' => $id_user];
            
                    $data = $this->model->getProfile($valores);

                    $valores = [ 
                        "name" => $file,
                        "descripcion" => $url_insert.$file,
                        "id_profile_fk" => $data['id_profiles']
                    ];

                    $model = new ImagenModel();

                    
                    $model -> storage($valores);
                    
                    header('location:' . URL . '/admin');


                } else {
                    $errores['error_load'] = "el archivo no pudo se guardado";

                    $data = [
                        'Titulo' => 'Perfiles',
                        'subtitulos' => 'actualizar perfil',
                        "errores" => $errores
                    ];
            
                    $this -> view('profile/update', $data, 'auth');
                }


            }else{
            $data = [
                'Titulo' => 'Perfiles',
                'subtitulos' => 'actualizar perfil',
                "errores" => $errores
            ];
    
            $this -> view('profile/update', $data, 'auth');
        }

        }else{
            $data = [
                'Titulo' => 'Perfiles',
                'subtitulos' => 'actualizar perfil',
            ];
    
            $this -> view('profile/update', $data, 'auth');
        }
    }
}