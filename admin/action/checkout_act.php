<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$items = Cart::getCartItems();
$userId = $_SESSION['logged_in']['id'] ?? FALSE;

try {
    if($userId){

        $datosCompra = [
            "id_usuario" => $userId,
            "fecha" => date('Y-m-d'),
            "importe" => Cart::getTotalPrice()
        ];

        $detalleCompra = [];
        foreach ($items as $key => $value) {
            $detalleCompra[$key] = $value['cantidad'];
        }

        Chekout::insertCheckoutData($datosCompra, $detalleCompra);
        Cart::clearCart();

        Flags::add_flags('success', 'Compra finalizada con éxito. ¡Gracias por su compra! Vamos estar validando sus datos y le enviaremos un correo electrónico con la confirmación de su compra y la efectiva validación de su curadoría! TEAM Malba!');

    }else{
        Flags::add_flags('warning', 'Su sesión expiró. Por favor, intente iniciar sesión nuevamente!');
        header('location: ../../index.php?section=login');
    }

} catch (Exception $e) {
    Flags::add_flags('warning', 'No se pudo finalizar la compra. Por favor, intente nuevamente más tarde.');
    header('location: ../../index.php?section=checkout');
}
header('location: ../../index.php?section=user_panel');