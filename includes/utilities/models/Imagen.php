<?php
class Imagen
{


    public static function subirImagen(string $directorio, array $datosArchivo): string
    {

        // ! Nombre / Extensión
        $name_og = explode(".", $datosArchivo['name']);
        $extension = end($name_og);

        // // ! Definir un nombre nuevo
        // $timestamp = time();

        // ! Definir la extensión 
        $filename = time() . ".$extension";

        // ! Verificar si el directorio existe, si no, crearlo y pasar el permiso por apple 0755
        if (!is_dir($directorio)){
            mkdir($directorio, 0755, true);
        }

        $uploadPath = rtrim($directorio, '/') . '/' . $filename;
        // ! Mover el archivo de la carpeta temporal al directorio deseado
        $fileUpload = move_uploaded_file($datosArchivo['tmp_name'], $uploadPath);

        // ! Devolver el nombre del archivo
        // TODO Si algo sale mal, exception DEVOLVER UNA EXCEPTION
        if (!$fileUpload){
            throw new Exception("No se pudo subir la imagen!");
        } 

        $publicPath = str_replace(['../', './'], '', $uploadPath);
        return $publicPath;
    }

    public static function borrarImagen($archivo): bool
    {
        if (file_exists($archivo)){
            $fileDelete = unlink($archivo);

            if(!$fileDelete){
                throw new Exception("No se pudo eliminar la imagen");

            } else{
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }
}