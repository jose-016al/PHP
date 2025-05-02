<header>
  <div id="logo">
    <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo">
    <a href="<?=base_url?>">Tienda de camisetas</a>
  </div>
</header>

<?php $categories = Utils::showCategories(); ?>
<nav>
  <ul>
    <li><a href="<?=base_url?>">Inicio</a></li>
    <?php while($cat = $categories->fetch_object()): ?>
      <li><a href="<?=base_url?>category/show&id=<?=$cat->id?>"><?=$cat->name?></a></li>
    <?php endwhile; ?>
  </ul>
</nav>