<?php require_once "./Includes/helper.php" ?>
<aside id="sidebar">
  <div id="login" class="block-aside">
    <h3>Identificate</h3>
    <form action="login.php" method="POST">
      <label for="email">Email</label>
      <input type="email" name="email">

      <label for="password">Contaseña</label>
      <input type="password" name="password">

      <input type="submit" value="Enviar">
    </form>
  </div>

  <div id="register" class="block-aside">
    
    <?php if (isset($_SESSION['complete'])): ?>
        <div class="alert alert-success"><?=$_SESSION['complete']?></div>
    <?php elseif(isset($_SESSION['errors']['general'])): ?>
      <div class="alert alert-error"><?=$_SESSION['errors']['general']?></div>
    <?php endif; ?>

    <h3>Registrate</h3>
    <form action="register.php" method="POST">
      <label for="name">Nombre</label>
      <input type="text" name="name">
      <?php echo isset($_SESSION['errors']) ? errorsView($_SESSION['errors'], 'name') : '' ?>

      <label for="surname">Apellidos</label>
      <input type="text" name="surname">
      <?php echo isset($_SESSION['errors']) ? errorsView($_SESSION['errors'], 'surname') : '' ?>

      <label for="email">Email</label>
      <input type="email" name="email">
      <?php echo isset($_SESSION['errors']) ? errorsView($_SESSION['errors'], 'email') : '' ?>

      <label for="password">Contaseña</label>
      <input type="password" name="password">
      <?php echo isset($_SESSION['errors']) ? errorsView($_SESSION['errors'], 'password') : '' ?>

      <input type="submit" value="Registrar">
    </form>
    <?php cleanErrors() ?>
  </div>
</aside>