<div id="primary">
  <?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria con el coste del pedido será procesado y enviado.</p>

    <br/>
    <?php if (isset($order)): ?>

      <h3>Datos del pedido:</h3>
      <p>Número de pedido: <?= $order->id ?></p>
      <p>Total a pagar: <?= $order->cost ?>€</p>
      <p>Productos:</p>
      <table>
        <tr>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Unidades</th>
        </tr>
        <?php while ($product = $products->fetch_object()): ?>
          <td>
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
              <td><?= $product->units ?></td>
            </tr>
          </td>
        <?php endwhile; ?>
      </table>
    <?php endif; ?>
  <?php elseif (isset($_SESSION['order']) && $_SESSION['order'] == 'failed'): ?>
    <h1>Tu pedido no ha podido procesarse</h1>
  <?php endif; ?>
</div>