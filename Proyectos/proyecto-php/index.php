<?php require_once "./Includes/db.php" ?>
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
      <h1>Ultimas entradas</h1>
      <article class="entrada">
        <a href="#">
          <h2>Titulo de entrada</h2>
          <p>Descripcion</p>
        </a>  
      </article>
      <article class="entrada">
        <a href="#">
          <h2>Titulo de entrada</h2>
          <p>Descripcion</p>
        </a>  
      </article>
      <article class="entrada">
        <a href="#">
          <h2>Titulo de entrada</h2>
          <p>Descripcion</p>
        </a>  
      </article>

      <div id="see-all"><a href="#">Ver todas las entradas</a></div>
    </div>

    <div class="clearfix"></div>

    <?php require_once "./Includes/footer.php" ?>
  </div>
</body>
</html>