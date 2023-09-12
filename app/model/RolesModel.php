<?php

namespace Adso\model;

use Adso\libs\Model;

class RolesModel extends Model{
    
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
}