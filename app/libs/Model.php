<?php

namespace Adso\libs;

use Adso\libs\Database;

class Model
{
    protected $db;
    protected $connection;

    function __construct()
    {
        // Crear una nueva instancia de la clase Database
        $this->db = new Database();
    }

    /**
     * Método para insertar registros en la base de datos
     */
    public function insert($tabla = "", $columnas = [])
    {
        // Crear cadenas vacías para las columnas y los parámetros
        $columns = "";
        $params = "";

        // Recorrer el array asociativo de columnas y valores
        foreach ($columnas as $key => $value) {
            // Agregar el nombre de la columna a la cadena de columnas
            $columns .= $key . ",";

            // Agregar el marcador de parámetro a la cadena de parámetros
            $params .= ":" . $key . ",";
        }

        // Eliminar la última coma de las cadenas de columnas y parámetros
        $columns = rtrim($columns, ',');
        $params = rtrim($params, ',');

        // Construir la consulta SQL de inserción utilizando las cadenas formadas
        $sql = "INSERT INTO $tabla ($columns) VALUES ($params)";

        // Preparar la consulta SQL
        $stm = $this->connection->prepare($sql);

        // Asignar valores a los parámetros utilizando enlaces de parámetros
        foreach ($columnas as $key => $value) {
            $stm->bindValue(":" . $key, $value);
        }

        // Ejecutar la consulta preparada
        
        if ($stm->execute()) {
           
            return $this->connection->lastInsertId();
           
        } else {
            return $this->connection->errorInfo();
        }
    }

    public function select($tabla = ""){

        $sql = "SELECT * FROM $tabla";

        $stm = $this -> connection -> prepare($sql);

        $stm -> execute();

        return $stm -> fetchAll();
    }

    public function getDataById($param, $tabla = "" ){

        $sql = "SELECT * FROM $tabla WHERE id_role = $param";

        $stm = $this -> connection -> prepare($sql);

        $stm -> execute();

        return $stm -> fetch();
    }
}
