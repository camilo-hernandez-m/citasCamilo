<?php

/* se definen el url donde se va a ingresar a la carpeta en el localhost */
define('URL', 'http://localhost/citas');
/*el name es el namespace que se de da al archivo de app=ADSO */
define('NAME', 'ADSO');
/*la kay es la llave de encriptaacion  */
define('KEY', 'mimamamemima');
/* la master es la llave que encripta */
define('MASTER', 'llaveparacodific');
/* el host ,db, user,password, charset son los parametros que requier la base de datos */
define('HOST', 'localhost');
define('DB', 'sena_login');
define('USER', 'root');
define('PASSWORD', '');
define('CHARSET', 'utf8mb4');

define('ROLES', [
    'admin' => 1,
    'user' => 2
]);
