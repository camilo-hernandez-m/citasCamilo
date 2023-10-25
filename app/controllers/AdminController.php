<?php
// Declaración del espacio de nombres y uso de clases
namespace Adso\controllers;
use Adso\Libs\Controller; // Se importa y utiliza la clase Controller del espacio de nombres Adso\Libs
use Adso\libs\Permission; // Se importa y utiliza la clase Permission del espacio de nombres Adso\libs

class AdminController extends Controller
{
    function __construct()
    {
        // Constructor de la clase
    }

    function index()
    {
        // Método index de la clase AdminController

        // Se crea un array llamado $data con información para la vista
        $data = [
            "titulo"    => "Home",
            "subtitulo" => "Saludo del sistema",
            "menu"      => true
        ];

        // Se llama al método 'view' de la clase Controller para cargar la vista 'admin' con los datos proporcionados
        $this->view("admin", $data, 'app');
    }
}

