<?php
session_start();

function autoloadClass($className)
{
    //echo "<p> Se solicita una clase no incluida: $className </p>";

    $folder = __DIR__ . "/../models/$className.php";

    if (file_exists($folder)){
        require_once $folder;
    }else{
        die("No se pudo cargar la clase: $className");
    }
}

spl_autoload_register('autoloadClass');