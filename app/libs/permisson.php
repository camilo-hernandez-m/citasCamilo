<?php

namespace Adso\libs;

use Adso\libs\Database;

class Permisson{
    private $sesion;
    function __construct()
    {
        $this -> sesion = new Session();
    }

    function getRoles()
    {
        
        if($this -> sesion -> getLogin()){

            $role = $this -> sesion -> getUser()['id_role_fk'];

            foreach(constant('ROLES') as $key => $valor){
                if($role == $valor){
                    header('location:' . URL . '/'. $key);
                }
            }
        }else{
            header('location:' . URL . '/login');
        }
    }

    public function ifpermisson($id)
    {

        print_r($id);
        die();

        $respuesta = false;

        $role = $this -> sesion -> getUser()['id_role_fk'];

        if($this -> sesion -> getLogin()){
            if($role == $id){
                $respuesta = true;
            }
        }

        return $respuesta;
    }

    
}
