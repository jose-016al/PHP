<?php 
  require_once './Includes/db.php';
  require_once './Includes/helper.php';
  require_once './Includes/redirect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog de videojuegos</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <?php require_once "./Includes/header.php" ?>
  <div id="container">
    <?php require_once "./Includes/aside.php" ?>
    <div id="primary">
      <h1>Crear categorias</h1>
      <p>Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear sus entradas.</p>
      <br/>

      <?php if (isset($_SESSION['errors-category']['general'])): ?>
        <div class="alert alert-error"><?=$_SESSION['errors-category']['general']?></div>
      <?php endif; ?>

      <form action="newCategory.php" method="post">
        <label for="name">Nombre de la categoria</label>
        <input type="text" name="name">
        <?php echo isset($_SESSION['errors-category']) ? errorsView($_SESSION['errors-category'], 'name') : '' ?>

        <input type="submit" name="newCategory" value="Crear">
      </form>
      <?php cleanErrorsCategory() ?>
    </div>

    <div class="clearfix"></div>

    <?php require_once "./Includes/footer.php" ?>
  </div>
</body>
</html>