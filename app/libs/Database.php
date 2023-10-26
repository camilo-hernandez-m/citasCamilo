<?php

namespace Adso\libs;

use PDO;

class Database
{
    /**
     * @var PDO La instancia de la conexión a la base de datos.
     */
    /**
      * 
     * Propiedad protegida para almacenar el modelo relacionado con roles.
     * @var mixed
     */
    private $connection;

    /**
     * Constructor de la clase Database.
     * Crea una instancia de la clase y establece la conexión a la base de datos.
     */
    public function __construct()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        /**
         *  Construye la cadena de conexión a la base de datos utilizando constantes definidas.
         */

        $this->connection = "mysql:host=" . constant('HOST') . "; dbname=" . constant('DB') . "; charset=" . constant('CHARSET');

        /**
         * Crea una instancia de PDO y establece la conexión a la base de datos.
         */
        $this->connection = new PDO($this->connection, constant('USER'), constant('PASSWORD'), $options);
        /**
         *  Establece el conjunto de caracteres a UTF8 para la conexión.
         */

        $this->connection->exec("SET CHARACTER SET UTF8");
    }

    /**
     * Obtiene la instancia de la conexión a la base de datos.
     *
     * @return PDO La instancia de la conexión a la base de datos.
     */
    function getConnection()
    {
        return $this->connection;
    }

    /**
     * Cierra la conexión a la base de datos.
     */
    function closConnection()
    {
        $this->connection = null;
    }
}
