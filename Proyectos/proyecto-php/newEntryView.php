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
      <h1>Crear entradas</h1>
      <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutar de nuestro contenido.</p>

      <br/>

      <?php if (isset($_SESSION['errors-entry']['general'])): ?>
        <div class="alert alert-error"><?=$_SESSION['errors-entry']['general']?></div>
      <?php endif; ?>

      <form action="newEntry.php" method="post">
        <label for="title">titulo de la entrada</label>
        <input type="text" name="title">
        <?php echo isset($_SESSION['errors-entry']) ? errorsView($_SESSION['errors-entry'], 'name') : '' ?>

        <label for="category">Categoria</label>
        <select name="category">
          <option value="" default>Selecciona una categoria</option>
          <?php 
            $categorys = findAllCategory($db);
            while($category = mysqli_fetch_assoc($categorys)): 
          ?>
              <option value=<?=$category['id']?>><?=$category['nombre']?></option>
          <?php endwhile; ?>
        </select>
        <?php echo isset($_SESSION['errors-entry']) ? errorsView($_SESSION['errors-entry'], 'category') : '' ?>

        <label for="description">Descripcion</label>
        <textarea name="description"></textarea>
        <?php echo isset($_SESSION['errors-entry']) ? errorsView($_SESSION['errors-entry'], 'description') : '' ?>

        <input type="submit" name="newEntry" value="Crear">
      </form>
      <?php cleanErrorsEntry() ?>
    </div>

    <div class="clearfix"></div>

    <?php require_once "./Includes/footer.php" ?>
  </div>
</body>
</html>