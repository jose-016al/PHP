<aside id="sidebar">

  <?php if(isset($_SESSION['user'])): ?>
    <div id="user-sigin" class="block-aside">
      <h3>Bienvenido, <?=$_SESSION['user']['nombre'] ?></h3>
      <a href="newEntryView.php" class="button button-green">Crear entrada</a>
      <a href="newCategoryView.php" class="button button-green">Crear categoria</a>
      <a href="logout.php" class="button button-orange">Mis datos</a>
      <a href="logout.php" class="button button-red">Cerrar sesion</a>
    </div>
  <?php endif; ?>
  
  <?php if(!isset($_SESSION['user'])): ?>
    <div id="login" class="block-aside">

      <?php if (isset($_SESSION['errors-login']['general'])): ?>
        <div class="alert alert-error"><?=$_SESSION['errors-login']['general']?></div>
      <?php endif; ?>

      <h3>Identificate</h3>
      <form action="login.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email">
        <?php echo isset($_SESSION['errors-login']) ? errorsView($_SESSION['errors-login'], 'email') : '' ?>

        <label for="password">Contaseña</label>
        <input type="password" name="password">
        <?php echo isset($_SESSION['errors-login']) ? errorsView($_SESSION['errors-login'], 'password') : '' ?>

        <input type="submit" name="login" value="Enviar">
      </form>
      <?php cleanErrorsLogin() ?>
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

        <input type="submit" name="register" value="Registrar">
      </form>
      <?php cleanErrorsRegister() ?>
    </div>
  <?php endif; ?>
</aside>