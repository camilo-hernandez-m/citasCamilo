<?php

namespace Adso\model;

use Adso\libs\Model;

class RoleModel extends Model
{

    private $tabla = "roles";

    function __construct()
    {
        parent::__construct();
    }

    function getRoles()
    {
        $this->connection = $this->db->getConnection();
        $data = $this->select($this->tabla);
        $this->connection = $this->db->closConnection();

        return $data;
    }

    function storage($roles)
    {
        $this->connection = $this->db->getConnection();
        $data = $this->insert($this->tabla, $roles);
        $this->connection = $this->db->closConnection();
    }

    function getRole($id)
    {
        $this->connection = $this->db->getConnection();
        $data = $this->getDataById($this->tabla, $id);
        $this->connection = $this->db->closConnection();
        return $data;
    }
    function updateRole($roles)
    {
        $this->connection = $this->db->getConnection();
        $data = $this->update($this->tabla, $roles);
        $this->connection = $this->db->closConnection();
    }
    function deleteRole($id)
    {
        $this->connection = $this->db->getConnection();
        $data = $this->delete($this->tabla, $id);
        $this->connection = $this->db->closConnection();
    }
}