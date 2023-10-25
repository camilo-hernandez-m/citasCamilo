<?php

namespace Adso\model;
use Adso\libs\Model;

class ImagenModel extends Model{
    private $tabla = "imagens";

    function __construct()
    {
        parent::__construct();
    }

    function storage($valores)
    {
        $this->connection = $this->db->getConnection();
        $this->insert($this -> tabla, $valores);
        $this->connection = $this->db->closConnection();
    }
}