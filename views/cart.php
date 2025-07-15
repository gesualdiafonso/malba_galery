<?php

$items = Cart::getCartItems();

?>

<section class="uk-animation-fade" >
    <div class="uk-background-fixed uk-background-contain uk-height-medium uk-width-expand uk-flex uk-flex-center uk-flex-middle" style="background-image: url('public/images/MalbaColeccion.jpg');">
        <div class="uk-text-center uk-height-medium uk-padding-large uk-width-expand uk-overlay-primary">
            <h2>Mi Carrito</h2>
        </div>
    </div>
</section>

<section class="uk-container">
    <?php if(count($items)) { ?>
        <div class="uk-overflow-auto">
            <div>
                <?= Flags::get_flags(); ?>
            </div>
            <form action="admin/action/update_items_act.php" method="post" >
                <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                    <thead>
                        <tr>
                            <th class="uk-table-expand"></th>
                            <th class="uk-table-expand"><h2 class="uk-text-small uk-text-light">Producto</h2></th>
                            <th class="uk-width-small"><h2 class="uk-text-small uk-text-light">Precio</h2></th>
                            <th class="uk-width-small"><h2 class="uk-text-small uk-text-light">Subtotal</h2></th>
                            <th class="uk-table-expand uk-text-nowrap"><h2 class="uk-text-small uk-text-light">Cantidad</h2></th>
                            <th class="uk-table-expand"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $id => $item): ?>
                            <tr>
                                <td class="uk-table-expand">
                                    <img src="<?= $item['image']; ?>" alt="<?= $item['name']; ?>" class="uk-preserve-width uk-text-center" style="max-height: 150px; margin: 0 auto;">
                                </td>
                                <td class="uk-table-expand">
                                    <div class="uk-flex uk-flex-column">
                                        <h3 class="uk-text-bold"><?= $item['name']; ?></h3>
                                        <span class="uk-text-muted"><?= $item['artista']; ?></span>
                                        <span><?= $item['informe']; ?></span>
                                    </div>
                                </td>
                                <td class="uk-width-small">
                                    <h3 class="uk-text-warning uk-text-default">U$ <?= number_format($item['price'], 2, ",", "."); ?></h3>
                                </td>
                                <td class="uk-width-small">
                                    <span class="uk-text-warning">U$ <?= number_format($item['price'] * $item['cantidad'], 2, ",", "."); ?></span>
                                </td>
                                <td class="uk-table-shrink uk-text-nowrap">
                                    <label for="cantidad_<?= $id ?>" class="uk-hidden">Cantidad</label>
                                    <input 
                                        type="number" 
                                        class="uk-input uk-form-width-small uk-text-center" 
                                        value="<?= $item['cantidad'] ?>" 
                                        id="cantidad_<?= $id ?>" 
                                        name="cantidad[<?= $id ?>]"
                                        >
                                </td>
                                <td class="uk-table-shrink">
                                    <a href="admin/action/remove_item_act.php?id=<?= $item['id']; ?>" class="uk-icon-link" uk-icon="icon: trash; ratio: 1.5" uk-tooltip="title: Eliminar"></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="uk-heading-divider"></div>
                <div class="uk-margin">
                    <input type="submit" value="Actualizar Carrito" class="uk-button uk-button-secondary">
                    <a href="admin/action/clear_items_act.php" class="uk-button uk-button-danger" role="button">Vaciar Carrito</a>
                </div>
            </form>
        </div>
        <hr class="uk-divider-icon">
        <div class="uk-flex uk-flex-column uk-flex-right">
            <div class="uk-text-right">
                <a href="index.php?section=galery" class="uk-button uk-button-text uk-text-default">Seguir comprando</a>
            </div>
            <div class="uk-text-right uk-margin-bottom">
                <h2 class="uk-text-bold">Total: <strong> U$<?= number_format(Cart::getTotalPrice(), 2, ",", "."); ?></strong></h2>
                <a href="index.php?section=checkout" class="uk-button uk-button-default">Proceder al Pago</a>
            </div>
        </div>
    <?php } else {  ?>
        <div class="uk-text-center uk-margin">
            <h3>Su carrito está vacio!!</h3>
            <a class="uk-button uk-button-text uk-text-large" href="index.php?section=galery">Ir a Galeria</a>
        </div>
    <?php } ?>
</section>