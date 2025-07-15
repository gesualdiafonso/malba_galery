<?php
class Cart
{


    /**
     * Agregar un item al carrito de compras
     * @param int #obraId el Id de la obra que se va a agregar.
     * @param int $cantidad la cantidad de obras por unidad que se van a agregar.
     */
    public static function addItem(int $obraId, int $cantidad)
    {
        $itemData = Obras::galeria_id($obraId);

        if ($itemData){
            $_SESSION['cart'][$obraId] = [
                'id' => $itemData->getId(),
                'name' => $itemData->getName(),
                'informe' => $itemData->getInforme(),
                'artista' => $itemData->getArtista_id()->getName(),
                'price' => $itemData->getPrice(),
                'image' => $itemData->getImage(),
                'cantidad' => $cantidad,
            ];
            self::saveCartToCookie(); // Guardar el carrito en una cookie
        }
    }

    /**
     * Elimina un item del carrito de compras
     * @param int $obraId el Id de la obra que se va a eliminar.
     */
    public static function removeItem(int $obraId)
    {
        if(isset($_SESSION['cart'][$obraId])){
            unset($_SESSION['cart'][$obraId]);
        }
    }

    /**
     * Vacia el carrito completamente
     */
    public static function clearCart()
    {
        $_SESSION['cart'] = [];
        // Também limpa o cookie persistente
        $userId = $_SESSION['logged_in']['id'] ?? null;
        $cookieName = $userId ? "persistent_cart_user_" . $userId : "persistent_cart_guest";

        setcookie($cookieName, "", time() - 3600, "/"); // Expira o cookie
    }

    /**
     * Devuelve el contenido del carrito de compraa actual
     */
    public static function getCartItems(): array
    {
        if (!empty($_SESSION['cart'])) {
            return $_SESSION['cart'];
        } else{
            return [];
        }
    }

    /**
     * Actualiza la cantidad de los ids provistos
     * @param array $cantidades Array asociativo con las cantidad de cada ID
     * 
     */
    public static function updateItems(array $cantidades)
    {
        foreach($cantidades as $key => $value){
            if(isset($_SESSION['cart'][$key])){
                $_SESSION['cart'][$key]['cantidad'] = $value;
            }
        }
    }

    /**
     * Devulve el precio total actual del carrito de compras
     */
    public static function getTotalPrice(): float
    {
        $total = 0;
        if(!empty($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['cantidad'];
            }
        }
        return $total;
    }

    /**
     * Devuelve la cantidad total de items en el carrito de compras
     */
    public static function getTotalItems(): int
    {
        $total = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['cantidad'];
            }
        }
        return $total;
    }

    /**
     * Carga el carrito de compras desde una cookie si existe
     */
    private static function saveCartToCookie()
    {

        $cartData = json_encode($_SESSION['cart'] ?? []); //Para retonrar el valor agregado

        // Determina el nombre de la cookie según si el usuario está logueado o no
        $userId = $_SESSION['logged_in']['id'] ?? null;
        $cookieName = $userId ? "persistent_cart_user_" . $userId : "persistent_cart_guest";

        // Establece la cookie con el carrito de compras, válida por 7 días
        setcookie($cookieName, $cartData, time() + (86400 * 7), "/");
    }

    /**
     * Guarda el carrito de compras en una cookie al finalizar la sesión
     */
    public static function restoreCartFromCookie()
    {
        $userId = $_SESSION['logged_in']['id'] ?? null;
        $cookieName = $userId ? "persistent_cart_user_" . $userId : "persistent_cart_guest";

         if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            if (isset($_COOKIE[$cookieName])) {
                $cookieData = json_decode($_COOKIE[$cookieName], true);
                if (is_array($cookieData)) {
                    $_SESSION['cart'] = $cookieData;
                }
            }
        }
    }
}