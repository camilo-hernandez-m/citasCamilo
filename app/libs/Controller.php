<?php

namespace Adso\libs;

class Controller
{
    function __construct()
    {
    }

    /**
     * Metodo para llamar el modelo en Models
     */
    public function model($model = "")
    {
        $model = 'Adso\model\\' . $model . 'Model';
        return new $model();
    }

    /**
     * Metodo para llamar la vista en la clase (View)
     */
    public function view($view = "", $data = [], $layout = "")
    {
        ob_start();
        $view = $view . '.view';
        if (file_exists("../app/views/" . $view . ".php")) {
            require_once("../app/views/" . $view . ".php");
            $contend = ob_get_clean();
            require_once('../app/views/layout/' . $layout . '.layout.php');
        } else {
            die("La vista " . $view . "no existe");
        }
    }
}
