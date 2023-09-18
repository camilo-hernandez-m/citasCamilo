<?php

namespace Adso\model;

use Adso\libs\Model;

class RoleModel extends Model{

    private $tabla = "roles";
    
    function __construct()
    {
        parent::__construct();
    }

    function getRoles(){
        $this -> connection = $this -> db -> getConnection();
        $data = $this -> select($this -> tabla);
        $this -> connection = $this -> db -> closConnection();

        return $data;
    }

    function storage($roles){
        $this -> connection = $this -> db -> getConnection();
        $data = $this -> insert($this -> tabla, $roles);
        $this -> connection = $this -> db -> closConnection();
    }

    function getRole($id){
        $this -> connection = $this -> db -> getConnection();
        $data = $this -> getDataById($id, $this -> tabla);
        $this -> connection = $this -> db -> closConnection();
        return $data;
    }
}