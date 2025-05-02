<div id="primary">
  <h1>Gestionar productos</h1>

  <a href="<?=base_url?>product/add" class="button button-small">
    Añadir producto
  </a>

  <?php  if(isset($_SESSION['product']) && $_SESSION['product'] == 'complete'): ?>
    <strong class="alert_green">Producto creado correctamente</strong>
  <?php elseif(isset($_SESSION['product']) && $_SESSION['product'] == 'failed'): ?>
    <strong class="alert_red">Creación de producto fallido</strong>
  <?php endif; ?>
  <?php Utils::deleteSession('product'); ?>

  <?php  if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">Producto eliminado correctamente</strong>
  <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
    <strong class="alert_red">Eliminación de producto fallido</strong>
  <?php endif; ?>
  <?php Utils::deleteSession('delete'); ?>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Stock</th>
      <th>Acciones</th>
    </tr>
    <?php while($pro = $products->fetch_object()): ?>
      <tr>
        <td><?=$pro->id;?></td>
        <td><?=$pro->name;?></td>
        <td><?=$pro->price;?></td>
        <td><?=$pro->stock;?></td>
        <td>
          <a href="<?=base_url?>product/update&id=<?=$pro->id?>" class="button button-actions">Editar</a>
          <a href="<?=base_url?>product/delete&id=<?=$pro->id?>" class="button button-actions button-red">Eliminar</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</div>