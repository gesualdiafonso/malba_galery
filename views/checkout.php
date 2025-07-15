<?php
$items = Cart::getCartItems();
?>

<section class="uk-animation-fade" >
    <div class="uk-background-fixed uk-background-contain uk-height-medium uk-width-expand uk-flex uk-flex-center uk-flex-middle" style="background-image: url('public/images/MalbaColeccion.jpg');">
        <div class="uk-text-center uk-height-medium uk-padding-large uk-width-expand uk-overlay-primary">
            <h2>Finalizar el Pago </h2>
        </div>
    </div>
</section>
<section>
    <div class="uk-container">
        <div>
            <section>
                <h3>Datos del Usuario...</h3>
                <p><strong>Nombre de usuario</strong> <?= $userData['name'] ?> </p>
            </section>
        </div>
        <div>
            <?php 
                Flags::get_flags()
            ?>
        </div>
        <div>
            <table class="uk-table uk-table-striped uk-table-divider">
                <thead>
                    <tr>
                        <th>Nombre del Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $id => $item): ?>
                        <tr>
                            <td>
                                <h4 class="uk-text-large"><?= $item['name']; ?></h4>
                                <span class="uk-text-default uk-text-muted"><?= $item['artista']; ?></span>
                            </td>
                            <td>
                                <div class="uk-align-center">
                                    <span class="uk-text-light uk-text-large"><?= $item['cantidad']; ?></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span class="uk-text-warning uk-text-large">U$ <?= number_format($item['price'], 2, ",", "."); ?></span>
                                </div>
                            <td>
                                <div>
                                    <h5 class="uk-text-warning uk-text-large">U$ <?= number_format($item['price'] * $item['cantidad'], 2, ",", "."); ?></h5>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" class="uk-text-right uk-text-large"><strong>Total:</strong></td>
                        <td>
                            <h4 class="uk-text-warning uk-text-large">
                                U$ <?= number_format(array_sum(array_map(function($item) {
                                    return $item['price'] * $item['cantidad'];
                                }, $items)), 2, ",", "."); ?>
                            </h4>
                        </td>
                    </tr>
                    <tr>
                        <div class="uk-width-1-1">
                            <td colspan="4" class="uk-text-center">
                                <form action="admin/action/checkout_act.php" method="POST">
                                    <input type="hidden" name="total" value="<?= array_sum(array_map(function($item) {
                                        return $item['price'] * $item['cantidad'];
                                    }, $items)); ?>">
                                    <button type="submit" class="uk-button uk-button-default uk-text-default uk-width-expand">Finalizar Compra</button>
                                </form>
                            </td>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>