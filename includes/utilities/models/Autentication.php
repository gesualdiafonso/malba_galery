<?php
class Autentication
{
    /**
     * Verifica las credenciales del usuario, y de ser correctas, guarda los datos en la sesión
     * @param string $user_name El nombre del usuario
     * @param string $password La contraseña del usuario
     * @return mixed Devuelve el rol en caso que las credenciales sean correctas, FALSE en caso de que no la sean y NUll en caso que el usuario no se encuentra en la BD.
     */
    public static function log_in(string $usuario, string $password)
    {
        $datosUsuario = Usuarios::usuario_username($usuario);

        if($datosUsuario){
            if(password_verify($password, $datosUsuario->getPassword())){

                $datosLogin['user_name'] = $datosUsuario->getUser_name();
                $datosLogin['name'] = $datosUsuario->getName();
                $datosLogin['email'] = $datosUsuario->getEmail();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['role'] = $datosUsuario->getRole();

                // Guardar los datos del usuario en la sesión
                $_SESSION['logged_in'] = $datosLogin;

                return $datosLogin['role']; // Devuelve el rol del usuario si la contraseña es correcta

            }else{
                Flags::add_flags('danger', "La contraseña ingresada no es correcta.");
                return false; // Contraseña incorrecta
            }
        }else{
            Flags::add_flags('warning', "El usuario ingresado no existe.");
            return null; // Usuario no encontrado
        }
    }

    public static function log_out()
    {
        if(isset($_SESSION['logged_in'])){
            // Eliminar los datos de la sesión
            unset($_SESSION['logged_in']);
            session_destroy(); // Destruye la sesión
            Flags::add_flags('success', "Logout finalizado con suceso.");

            return true; // Logout exitoso
        } else {
            return false; // No hay sesión activa
        }

    }

    public static function verify($nivel = 0): bool
    {
        if (!$nivel){
            return true;
        };

        if (isset($_SESSION['logged_in'])) {

            if ($nivel > 1){ // Restriccion es de Nivel 2 - Acceso Administrado
                if (
                    $_SESSION['logged_in']['role'] == "admin"
                    or 
                    $_SESSION['logged_in']['role'] == "superadmin"
                ){
                    return TRUE; // Si el usuario es admin o superadmin, se permite el acceso
                }
                else {
                    Flags::add_flags('warning', "Acceso restringido. No tiene permiso para acceder a esta sección.");
                    header('Location: ../index.php?section=login');
                    // Si el nivel es 1 o menor, se permite el acceso
                    return true;
                }
            } else{
                // Si el nivel es 0 o 1, se permite el acceso
                return true;
            }
        } else {
            $routeMod = $nivel > 1 ? '/admin/' : '';
            header("Location: {$routeMod}index.php?section=login");
            return false; // No hay sesión activa, se redirige al login
        }

    }
}