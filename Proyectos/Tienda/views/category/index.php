<div id="primary">
  <h1>Gestionar categorias</h1>

  <a href="<?=base_url?>category/add" class="button button-small">
    Añadir categoria
  </a>

  <?php  if(isset($_SESSION['category']) && $_SESSION['category'] == 'complete'): ?>
    <strong class="alert_green">Categoria creada correctamente</strong>
  <?php elseif(isset($_SESSION['category']) && $_SESSION['category'] == 'failed'): ?>
    <strong class="alert_red">Creación de categoria fallido</strong>
  <?php endif; ?>
  <?php Utils::deleteSession('category'); ?>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Acciones</th>
    </tr>
    <?php while($cat = $categories->fetch_object()): ?>
      <tr>
        <td><?=$cat->id;?></td>
        <td><?=$cat->name;?></td>
        <td>
          <a href="<?=base_url?>category/update&id=<?=$cat->id?>" class="button button-actions">Editar</a>
          <a href="<?=base_url?>category/delete&id=<?=$cat->id?>" class="button button-actions button-red">Eliminar</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</div>