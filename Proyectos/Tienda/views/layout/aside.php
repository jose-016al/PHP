<aside>
  <div id="login" class="block_aside">
    <h3>Mi carrito</h3>
    <ul>
      <?php $cart = Utils::getCart() ?>
      <li><a href="<?= base_url ?>cart/index">Productos (<?= $cart['count'] ?>)</a></li>
      <li><a href="<?= base_url ?>cart/index">Total: <?= $cart['total'] ?> €</a></li>
      <li><a href="<?= base_url ?>cart/index">Ver el carrito</a></li>
    </ul>
  </div>

  <div id="login" class="block_aside">
    <?php if (!isset($_SESSION['user'])): ?>
      <h3>Entrar a la web</h3>

      <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == 'failed'): ?>
        <strong class="alert_red">Login incorrecto</strong>
      <?php endif; ?>
      <?php Utils::deleteSession('error_login'); ?>
      
      <form action="<?= base_url ?>user/login" method="POST">
        <label for="email">Email</label>
        <input type="text" name="email" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" required>

        <input type="submit" value="Enviar">
      </form>
    <?php else: ?>
      <h3><?= $_SESSION['user']->first_name ?> <?= $_SESSION['user']->last_name ?></h3>
    <?php endif; ?>

    <ul>
      <?php if (isset($_SESSION['admin'])): ?>
        <li><a href="<?= base_url ?>user/index">Gestionar usuarios</a></li>
        <li><a href="<?= base_url ?>category/index">Gestionar categorias</a></li>
        <li><a href="<?= base_url ?>product/index">Gestionar productos</a></li>
        <li><a href="<?= base_url ?>order/index">Gestionar pedidos</a></li>
      <?php endif; ?>
      <?php if (isset($_SESSION['user'])): ?>
        <li><a href="<?= base_url ?>user/profile&id=<?=$_SESSION['user']->id?>">Mi perfil</a></li>
        <li><a href="<?= base_url ?>order/my_orders">Mis pedidos</a></li>
        <li><a href="<?= base_url ?>user/logout">Cerrar sesión</a></li>
      <?php else: ?>
        <li><a href="<?= base_url ?>user/register">Registrate</a></li>
      <?php endif; ?>
    </ul>
  </div>
</aside>