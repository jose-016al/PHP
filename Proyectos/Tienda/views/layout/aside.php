<aside>
  <div id="login" class="block_aside">
    <h3>Mi carrito</h3>
    <ul>
    <?php $stats = Utils::statsCart() ?>
    <li><a href="<?= base_url ?>cart/index">Productos (<?=$stats['count']?>)</a></li>
    <li><a href="<?= base_url ?>cart/index">Total: <?=$stats['total']?> €</a></li>
      <li><a href="<?= base_url ?>cart/index">Ver el carrito</a></li>
    </ul>
  </div>

  <div id="login" class="block_aside">
    <?php if (!isset($_SESSION['user'])): ?>
      <h3>Entrar a la web</h3>
      <form action="<?= base_url ?>user/login" method="POST">
        <label for="email">Email</label>
        <input type="text" name="email">

        <label for="password">Contraseña</label>
        <input type="password" name="password">

        <input type="submit" value="Enviar">
      </form>
    <?php else: ?>
      <h3><?= $_SESSION['user']->first_name ?> <?= $_SESSION['user']->last_name ?></h3>
    <?php endif; ?>

    <ul>
      <?php if (isset($_SESSION['admin'])): ?>
        <li><a href="<?= base_url ?>category/index">Gestionar categorias</a></li>
        <li><a href="<?= base_url ?>product/index">Gestionar productos</a></li>
        <li><a href="<?=base_url?>order/index">Gestionar pedidos</a></li>
      <?php endif; ?>
      <?php if (isset($_SESSION['user'])): ?>
        <li><a href="<?=base_url?>order/my_orders">Mis pedidos</a></li>
        <li><a href="<?= base_url ?>user/logout">Cerrar sesión</a></li>
      <?php else: ?>
        <li><a href="<?= base_url ?>user/register">Registrate</a></li>
      <?php endif; ?>
    </ul>
  </div>
</aside>