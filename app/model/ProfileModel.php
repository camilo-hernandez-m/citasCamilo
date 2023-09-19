<?php

namespace Adso\model;

use Adso\libs\Model;

class ProfileModel extends Model
{
    private $tabla = "profiles";

    function __construct()
    {
        parent::__construct();
    }

    function storage($valores, $comm = "")
    {
        if ($comm != "") {
            $this->connection = $comm;
        } else {
            $this->connection = $this->db->getConnection();
        }
        $this->insert("profiles", $valores);
        $this->connection = $this->db->closConnection();
    }

    function getProfile($valores)
    {
        $this->connection = $this->db->getConnection();
        $data = $this->getDataById($valores, $this->tabla);
        $this->connection = $this->db->closConnection();
        return $data;
    }
}
