<?php

function classAutoload($pClassName)
{
    $path_service = [
        "App",
        "App/Master",
        "App/Master/Controllers",
        "App/Master/Models"
    ];
    foreach ($path_service as $folder) {
        $classNameParts = explode('\\', $pClassName);
        //The last piece of the array will be our class name.
        $pClassName= end($classNameParts);
        if (file_exists(__DIR__ . "/$folder/" . $pClassName . ".php")) {
            include(__DIR__ . DIRECTORY_SEPARATOR."$folder" .DIRECTORY_SEPARATOR. $pClassName . ".php");
        }
    }
}
spl_autoload_register("classAutoload");