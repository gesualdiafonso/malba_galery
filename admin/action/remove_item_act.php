<?php
require_once "../../includes/utilities/controllers/autoloader.php";

$id = $_GET['id'] ?? FALSE;

if ($id){
    Cart::removeItem($id);
    Flags::add_flags('success', "El item ha sido eliminado del carrito correctamente.");
    header("Location: ../../index.php?section=cart");
}