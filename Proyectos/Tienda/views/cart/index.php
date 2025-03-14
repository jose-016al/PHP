<div id="primary">
  <h1>Carrito de la compra</h1>
  <?php if (isset($cart)): ?>
    <table>
      <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Eliminar</th>
      </tr>
      <?php
      foreach ($cart as $index => $value):
        $product = $value['product'];
      ?>
        <tr>
          <td>
            <?php if ($product->image != null): ?>
              <img src="<?= base_url ?>uploads/images/<?= $product->image ?>" class="img_cart">
            <?php else: ?>
              <img src="<?= base_url ?>assets/img/camiseta.png" class="img_cart">
            <?php endif; ?>
          </td>
          <td><a href="<?= base_url ?>product/show&id=<?= $product->id ?>"><?= $product->name ?></a></td>
          <td><?= $product->price ?></td>
          <td>
            <?= $value['units'] ?>
            <div class="updown-units">
              <a href="<?= base_url ?>cart/up&index=<?= $index ?>" class="button">+</a>
              <a href="<?= base_url ?>cart/down&index=<?= $index ?>" class="button">-</a>
            </div>
          </td>
          <td>
            <a href="<?= base_url ?>cart/remove&index=<?= $index ?>" class="button button-cart button-red">Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <p>El carrito esta vacio</p>
  <?php endif; ?>
  <br />
  <div class="delete-cart">
    <a href="<?= base_url ?>cart/delete_all" class="button button-delete button-red">Vaciar carrito</a>
  </div>
  <div class="total-cart">
    <?php $stats = Utils::statsCart(); ?>
    <h3>Total: <?= $stats['total'] ?> €</h3>
    <a href="<?= base_url ?>order/process" class="button button-order">Hacer pedido</a>
  </div>
</div>