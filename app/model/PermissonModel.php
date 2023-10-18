<?php

namespace Adso\model;

use Adso\libs\Model;

class PermissonModel extends Model
{
    private $tabla = "permissions";

    function __construct()
    {
        parent::__construct();
    }

    function getPermisson(){
        $this -> connection = $this -> db -> getConnection();
        $data = $this -> select($this -> tabla);
        $this -> connection = $this -> db -> closConnection();

        return $data;
    }

    function getId($permisos){
        $this -> connection = $this -> db -> getConnection();
        $data = $this -> getDataById($permisos, $this -> tabla);
        $this -> connection = $this -> db -> closConnection();
    }

    function storage($permisos){
        $this -> connection = $this -> db -> getConnection();
        $data = $this -> insert($this -> tabla, $permisos);
        $this -> connection = $this -> db -> closConnection();
    }
}
