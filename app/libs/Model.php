<?php

namespace Adso\libs;

use Adso\libs\Database;

class Model
{
    protected $db;// Una propiedad protegida llamada $db en una clase
    protected $connection;// Otra propiedad protegida $connection en otra clase 

    /**
     * La funcion Contructor metodo donde  nos encargamos de instanciar  
     * una classes y da el resultado se almacena an la propiedad 
     */
    function __construct()
    {
        
        $this->db = new Database();//Crear una nueva instancia de la clase Database 
        $this->connection   = $this->db->getConnection();//llama al método getConnection() de la instancia de la clase Database y el resultado se almacena en la propiedad 
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

        /**Ejecutar la consulta preparada y retornarla */ 
        
        if ($stm->execute()) {
           
            return $this->connection->lastInsertId();
           
        } else {
            return $this->connection->errorInfo();
        }
    }
        /**Esta Funcion es el metodo de la clase que se encarga 
         * realizar la consulta en SQL para seleccionar 
         * todos los registros de una tabla espesifica en la base de datos*/
    public function select($tabla = ""){

        $sql = "SELECT * FROM $tabla"; //

        $stm = $this -> connection -> prepare($sql);

        $stm -> execute();

        return $stm -> fetchAll();
    }
            /**
         * Obtiene datos de una tabla en la base de datos filtrados por columna(s) y valor(es) específicos.
         *
         * Esta función ejecuta una consulta SQL para recuperar datos de una tabla en la base de datos, aplicando un filtro
         * mediante una o más columnas y sus respectivos valores. Los resultados se devuelven en un arreglo asociativo.
         *
         * @param string $tabla El nombre de la tabla de la cual se obtendrán los datos.
         * @param array $columnas Un arreglo asociativo que especifica las columnas y valores de filtro.
         *
         * @return array|false Un arreglo asociativo que contiene los datos obtenidos, o `false` si no se encontraron resultados.
         *
         * @throws \PDOException Si ocurre un error durante la ejecución de la consulta SQL.
         */
    /**
 * Obtiene datos de una tabla en la base de datos filtrados por columna(s) y valor(es) específicos.
 *
 * Esta función ejecuta una consulta SQL para recuperar datos de una tabla en la base de datos, aplicando un filtro
 * mediante una o más columnas y sus respectivos valores. Los resultados se devuelven en un arreglo asociativo.
 *
 * @param string $tabla El nombre de la tabla de la cual se obtendrán los datos.
 * @param array $columnas Un arreglo asociativo que especifica las columnas y valores de filtro.
 *
 * @return array|false Un arreglo asociativo que contiene los datos obtenidos, o `false` si no se encontraron resultados.
 *
 * @throws \PDOException Si ocurre un error durante la ejecución de la consulta SQL.
 */
public function getDataById($tabla = "", $columnas = [])
{
    $columns = "";
    $params = "";

    // Construye la cláusula WHERE de la consulta SQL en base a las columnas y valores especificados.
    foreach ($columnas as $key => $value) {
        $columns = $key;
        $params = $value;
    }

    // Construye la consulta SQL final.
    $sql = "SELECT * FROM $tabla WHERE $columns = $params";

    // Prepara la consulta SQL.
    $stm = $this->connection->prepare($sql);

    // Ejecuta la consulta SQL.
    $stm->execute();

    // Retorna los resultados obtenidos.
    return $stm->fetch();
}

    public function update($tabla = "", $columnas = [] ){

        $columns = "";
        $params = "";
        $clave = array_key_last($columnas);
        $valor = array_pop($columnas);

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
        $sql = "UPDATE $tabla SET $columns = $params WHERE $clave = $valor";

        // Preparar la consulta SQL
        $stm = $this->connection->prepare($sql);
        // Asignar valores a los parámetros utilizando enlaces de parámetros
        foreach ($columnas as $key => $value) {
            $stm->bindValue(":" . $key, $value);
        }
        // Ejecutar la consulta preparada

        print_r($stm);
        // die();
        
        if ($stm->execute()) {
           
            return $this->connection->lastInsertId();
           
        } else {
            return $this->connection->errorInfo();
        }
    }

    /**
 * Elimina registros de una tabla de la base de datos basándose en las columnas y valores proporcionados.
 *
 * Esta función ejecuta una consulta SQL para eliminar registros de una tabla de la base de datos utilizando
 * columnas y valores específicos proporcionados en forma de un arreglo asociativo.
 *
 * @param string $tabla El nombre de la tabla de la cual se eliminarán registros.
 * @param array $columnas Un arreglo asociativo que especifica las columnas y valores de filtro para la eliminación.
 *
 * @return bool `true` si la eliminación se realiza con éxito, `false` en caso de error.
 *
 * @throws \PDOException Si ocurre un error durante la ejecución de la consulta SQL.
 */
public function delete($tabla = "", $columnas = [])
{
    $columns = "";
    $params = "";

    // Construye la cláusula WHERE de la consulta SQL en base a las columnas y valores especificados.
    foreach ($columnas as $key => $value) {
        $columns = $key;
        $params = $value;
    }

    // Construye la consulta SQL final.
    $sql = "DELETE FROM $tabla WHERE $columns = $params";

    // Prepara la consulta SQL.
    $stm = $this->connection->prepare($sql);

    // Ejecuta la consulta SQL.
    $stm->execute();

    // Esta función devuelve un valor si se obtienen resultados de la consulta.
    // Sin embargo, dado que se trata de una operación de eliminación, es poco común
    // devolver resultados. En su lugar, se podría considerar devolver `true` si la eliminación
    // tiene éxito o lanzar una excepción en caso de error.
    return $stm->fetch();
}

}
