<?php

namespace Adso\libs;

use Carbon\Carbon;
use DateTimeZone;
use PSpell\Config;

class DateHelper {

    public static function  shortDate($date = ""){
        $carbon = new Carbon(); 

        $fecha = Carbon::parse($date)->locale('es');
        // $fecha = Carbon::createFromFormat('Y-');
        return $fecha -> isoFormat("D/MM/Y");
    }

}