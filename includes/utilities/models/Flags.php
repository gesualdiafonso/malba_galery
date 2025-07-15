<?php
class Flags
{
    /**
     * Registramos un alerta en el sistema, guandando en la sección
     * @param string $type el tipo de alerta danger, warning, success, info
     * @param string $msg El contendio de la alerta
     */
    public static function add_flags(string $type, string $msg)
    {
        $_SESSION['flags'][] = 
        [
            'type' => $type,
            'mensaje' => $msg
        ];
    }

    /**
     * Vacia la lista de alertas
     */
    public static function clear_flags()
    {
        $_SESSION['flags'] = [];
    }

    /**
     * Devulve todas las alertas refistrada en el sistema y vacia la lista
     * @return string
     */
    public static function get_flags()
    {
        if(!empty($_SESSION['flags'])){
            $flagsAcumulate = "";
            foreach ($_SESSION['flags'] as $flag){
                $flagsAcumulate .= self::print_flags($flag);
            }
            self::clear_flags();
            return $flagsAcumulate;
        } else {
            return null;
        }
    }

    private static function print_flags($flag): string
    {
        $html = "<div class=\"uk-alert uk-alert-{$flag['type']}\" uk-alert>";
        $html .= "<a class=\"uk-alert-close\" uk-close></a>";
        $html .= $flag['mensaje'];
        $html .= "</div>";

        return $html;
    }
}