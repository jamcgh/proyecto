<?php
    $host = "jmasoluciones.pw";
    $usuario = "root";
    $clave = "";
    $bd = "php_isil_sistema"

    $conexion =  mysqli_connect($host,$usuario,$clave,$bd);

    if($conexion){
        echo "Conectado correctamente"
    }else{
        echo "no se pudo conectar"
    }

?>