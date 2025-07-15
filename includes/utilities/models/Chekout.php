<?php
class Chekout
{
    /**
     * Insertar los datos de una compra en la BBDD
     * @param array $datosCompra Array con los datos de la compra
     * @param array $datailsData Array con los productos incluidos en la compra
     */
    public static function insertCheckoutData(array $datosCompra, array $datailsData)
    {

        $conection = Connection::getConnection();
        $query = "INSERT INTO compra VALUES (NULL, :id_usuario, :fecha, :importe)";
        $PDOStatement = $conection->prepare($query);
        $PDOStatement->execute([
            ':id_usuario' => $datosCompra['id_usuario'],
            ':fecha' => $datosCompra['fecha'],
            ':importe' => $datosCompra['importe']
        ]);

        $insertedId = $conection->lastInsertId();

        foreach($datailsData as $key => $value) {
            $query = "INSERT INTO item_compra VALUES (NULL, :compra_id, :item_id, :cantidad)";

            $PDOStatement = $conection->prepare($query);
            $PDOStatement->execute([
                ':compra_id' => $insertedId,
                ':item_id' => $key,
                ':cantidad' => $value
            ]);
        }
    }
}