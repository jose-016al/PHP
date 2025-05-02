<div id="primary">
  <?php if(isset($_SESSION['user'])): ?>
    <h1>Realizar pedido</h1>
    <p><a href="<?=base_url?>cart/index">Volver al carrito</a></p>
    <br/>

    <h3>Dirección para el envio:</h3>
    <form action="<?=base_url?>order/add" method="POST">
      <label for="province">Provincia</label>
      <input type="text" name="province" required>

      <label for="city">Ciudad</label>
      <input type="text" name="city" required>

      <label for="address">Dirección</label>
      <input type="text" name="address" required>

      <input type="submit" value="Confirmar pedido">
    </form>
  <?php else: ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado en la web para poder realizar tu pedido.</p>
  <?php endif; ?>
</div>