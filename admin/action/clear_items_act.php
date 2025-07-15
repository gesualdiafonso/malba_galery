<?PHP
require_once "../../includes/utilities/controllers/autoloader.php";

Cart::clearCart();
Flags::add_flags('success', "El carrito ha sido vaciado correctamente.");
header("Location: ../../index.php?section=cart");