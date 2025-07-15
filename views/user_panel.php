<?php
$userID = $_SESSION['logged_in']['id'] ?? FALSE;

$compras = Compra::getComprasByUserId($userID);

// echo "<pre>";
// print_r($compras);
// echo "</pre>";
?>

<section class="uk-container">
    <h2>Panel de Usuario</h2>
    <div>
        <?php 
            Flags::get_flags()
        ?>
    </div>
    <div class="uk-card uk-card-default uk-card-body">
        <h3>Bienvenido, <?= $userData['name'] ?? 'Usuario'; ?></h3>
        <p>Correo electrónico: <?= $userData['email'] ?? 'No disponible'; ?></p>
        <div>
            <h3>Historial de Compras</h3>
            <table class="uk-table uk-table-striped uk-table-divider">
                <thead>
                    <tr>
                        <th>ID de Compra</th>
                        <th>Fecha</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($compras): ?>
                        <?php foreach ($compras as $compra): ?>
                            <tr>
                                <td><?= $compra['id']; ?></td>
                                <td><?= $compra['fecha']; ?></td>
                                <td><?= $compra['detalle']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="uk-text-center">No hay compras registradas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>
</section>