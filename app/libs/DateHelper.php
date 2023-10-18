<?php

namespace Adso\libs;

use Carbon\Carbon;
use DateTimeZone;
use PSpell\Config;

class DateHelper {

    public static function shortDate($date = ""){
        $carbon = new Carbon(); 

        $fecha = Carbon::parse($date)->locale('es');
        // $fecha = Carbon::createFromFormat('Y-');
        return $fecha -> isoFormat("D/MM/Y");
    }
    public static function timestamp($hora) {
        

        // $horaEs = Carbon::parse($hora)->locale('es');
        // print_r($hora);
        // die();
        $fecha = Carbon::now('America/Bogota');

        $diff = $fecha -> diffInSeconds($hora);
        // print_r($diff);
        // die();
        return $diff;

    }
}