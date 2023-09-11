<?php

namespace Adso\model;

use Adso\libs\Database;
use Adso\libs\Model;

class UserModel extends Model
{

    function __construct()
    {
        // $this->db           = new Database();
        // $this->connection   = $this->db->getConnection();
        parent::__construct();
    }

    function getUsers()
    {
        $sql = "SELECT * FROM users";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    function getEmail($correo)
    {
        $sql = "SELECT admon_correo AS email FROM users WHERE email = :correo";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(":correo", $correo);
        $stm->execute();
        return $stm->fetch();
    }

    function updatePassword($id, $password)
    {
        $password = hash_hmac("sha512", $password, KEY);
        $password = substr($password, 0, 50);
        $connection = $this->db->getConnection();
        $sql = "UPDATE users SET password = :clave WHERE id_user = :id";
        $stm = $connection->prepare($sql);
        $stm->bindValue(":clave", $password);
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }

    function validate($user, $password)
    {
        $password = hash_hmac("sha512", $password, KEY);
        $password = substr($password, 0, 50);
        $connection = $this->db->getConnection();
        $sql = "SELECT * FROM users WHERE email = :correo AND password = :clave";
        $stm = $connection->prepare($sql);
        $stm->bindValue(":clave", $password);
        $stm->bindValue(":correo", $user);
        $stm->execute();
        return $stm->fetch();
    }

    function validateEmail ($email) {
        $sql = "SELECT id_user, email FROM users WHERE email = :correo";
        $connection = $this->db->getConnection();
        $stm = $connection->prepare($sql);
        $stm->bindValue(":correo", $email);
        $stm->execute();
        return $stm->fetch();
    }

    function storage($valores){
        $this->connection = $this->db->getConnection();
        return $this->insert("users", $valores);
        $this->connection = $this->db->closConnection();
    }
}
