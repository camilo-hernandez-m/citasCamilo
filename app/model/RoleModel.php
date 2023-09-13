<?php

namespace Adso\model;

use Adso\libs\Model;

class RoleModel extends Model{
    
    function __construct()
    {
        parent::__construct();
    }

    function getRoles(){
        $this -> connection = $this -> db -> getConnection();
        $data = $this -> select("roles");
        $this -> connection = $this -> db -> closConnection();

        return $data;
    }

    function storage($roles){
        $this -> connection = $this -> db -> getConnection();
        $data = $this -> insert("roles", $roles);
        $this -> connection = $this -> db -> closConnection();
    }
}