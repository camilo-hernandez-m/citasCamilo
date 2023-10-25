<?php

namespace Adso\model;

use Adso\libs\Model;

class RoleAsogModel extends Model
{
    protected $table = "role_permisson";

    function __construct(){
        parent::__construct();
    }

    function getData(){
        $this ->connection = $this -> db -> getConnection();
        $data = $this -> select($this -> table);
        $this ->connection = $this -> db ->closConnection();
        return $data;
    }
}
