<?php 
  require_once './Includes/db.php';
  require_once './Includes/helper.php';
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
      <h1>Ultimas entradas</h1>

      <?php 
        $entrys = findAllEntrysRecents($db);
        if (!empty($entrys)) :
          while($entry = mysqli_fetch_assoc($entrys)): 
      ?>
            <article class="entrada">
              <a href="entry.php?id=<?=$entry['id']?>">
                <h2><?=$entry['titulo']?></h2>
                <span class="date"><?=$entry['categoria'].' | '.$entry['fecha']?></span>
                <p><?=substr($entry['descripcion'], 0,180)."..."?></p>
              </a>  
            </article>
      <?php 
          endwhile; 
        endif;
      ?>

      <div id="see-all"><a href="#">Ver todas las entradas</a></div>
    </div>

    <div class="clearfix"></div>

    <?php require_once "./Includes/footer.php" ?>
  </div>
</body>
</html>