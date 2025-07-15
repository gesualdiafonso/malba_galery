<?php
require_once "../../includes/utilities/controllers/autoloader.php";

$postData = $_POST;

echo "<pre>";
print_r($postData);
echo "</pre>";

if(!empty($postData)){
    Cart::updateItems($postData['cantidad']);
    Flags::add_flags('success', "Los items del carrito han sido actualizados correctamente.");
    header("Location: ../../index.php?section=cart");
}