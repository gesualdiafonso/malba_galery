<?php
require_once "../../includes/utilities/controllers/autoloader.php";

echo "<pre>";
print_r($_GET);
echo "</pre>";


$id = $_GET['id'] ?? FALSE;
$cantidad = $_GET['cantidad'] ?? 1;

if($id){
    Cart::addItem($id, $cantidad);
    Flags::add_flags('success', "El item ha sido agregado al carrito correctamente.");
    header("Location: ../../index.php?section=cart");
}