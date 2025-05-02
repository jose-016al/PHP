<div id="primary">
  <h1>Carrito de la compra</h1>
  <?php if ($cart['count'] != 0):  ?>
    <?php $stock = true; ?>
    <table>
      <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Eliminar</th>
      </tr>
      <?php foreach ($cart['products'] as $product): ?>
        <tr>
          <td>
            <?php if ($product['product']['image'] != null): ?>
              <img src="<?= base_url ?>uploads/images/<?= $product['product']['image'] ?>" class="img_cart">
            <?php else: ?>
              <img src="<?= base_url ?>assets/img/camiseta.png" class="img_cart">
            <?php endif; ?>
          </td>
          <td><a href="<?= base_url ?>product/show&id=<?= $product['product']['id'] ?>"><?= $product['product']['name'] ?></a></td>
          <td><?= $product['product']['price'] ?></td>
          <td>
            <?php if($product['product']['stock'] == 0): ?>
              <?php $stock = false; ?>
              <p class="stock">SIN STOCK</p>
            <?php else: ?>
              <?= $product['units'] ?>
            <?php endif; ?>
            <div class="updown-units">
              <a href="<?= base_url ?>cart/down&id=<?= $product['product']['id'] ?>" class="button">-</a>
              <?php if($product['units'] < $product['product']['stock']): ?>
                <a href="<?= base_url ?>cart/up&id=<?= $product['product']['id'] ?>" class="button">+</a>
              <?php endif; ?>
            </div>
          </td>
          <td>
            <a href="<?= base_url ?>cart/remove&id=<?= $product['product']['id'] ?>" class="button button-cart button-red">Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <?php if(!$stock): ?>
      <p>
        Algunos de los productos añadidos al carrito no tienen stock. Elimínalos para poder continuar con la compra.
      </p>
    <?php endif; ?>
  <br />
  <div class="delete-cart">
    <a href="<?= base_url ?>cart/delete_all" class="button button-delete button-red">Vaciar carrito</a>
  </div>
  <div class="total-cart">
    <?php $cart = Utils::getCart(); ?>
    <h3>Total: <?= $cart['total'] ?> €</h3>
    <?php if($stock): ?>
      <a href="<?= base_url ?>order/process" class="button button-order">Hacer pedido</a>
    <?php endif; ?>
  </div>
  <?php else: ?>
    <p>El carrito esta vacio</p>
  <?php endif; ?> 
</div>