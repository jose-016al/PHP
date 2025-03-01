<?php 
  require_once 'db.php';
  require_once 'helper.php';
?>

<header id="header">
  <div id="logo">
    <a href="index.php">Blog de videojuegos</a>
  </div>

  <nav id="nav">
    <ul>
      <li><a href="index.php">Inicio</a></li>
      <?php 
        $categorys = findAllCategory($db);
        while($category = mysqli_fetch_assoc($categorys)): 
      ?>
        <li><a href="categoria.php?id=<?=$category['id']?>"><?=$category['nombre']?></a></li>  
      <?php endwhile; ?>
      <li><a href="index.php">Sobre mi</a></li>
      <li><a href="index.php">Contacto</a></li>
    </ul>
  </nav>
</header>