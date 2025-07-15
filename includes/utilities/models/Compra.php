<?php
class Compra
{

    /**
     * Devuleve las compras de un usuario en particular
     * @param int $userId El ID del usuario
     */
    public static function getComprasByUserId(int $userId): array
    {
        $conection = Connection::getConnection();
        $query = "
            SELECT 
            compra.id, 
            compra.fecha, 
            GROUP_CONCAT(CONCAT(item_compra.cantidad, ' x ', galeria.name) SEPARATOR ', ') detalle

            FROM compra 
            JOIN item_compra ON compra.id = item_compra.compra_id 
            JOIN galeria ON item_compra.item_id = galeria.id 

            WHERE compra.id_usuario = ? GROUP BY (compra.id);";

        $PDOStatement = $conection->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$userId]);

        $result = $PDOStatement->fetchAll();

        return $result ?? [];
    }
}