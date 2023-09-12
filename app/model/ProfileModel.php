<?php

namespace Adso\model;

use Adso\libs\Model;

class ProfileModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function storage($valores, $comm = "") {
        if($comm !=""){
            $this->connection = $comm;
        }else{
            $this->connection = $this->db->getConnection();
        }
        $this->insert("profiles", $valores);
        $this->connection = $this->db->closConnection();
    }
}