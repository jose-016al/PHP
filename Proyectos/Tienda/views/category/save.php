<div id="primary">
  <?php if(isset($edit) && isset($category) && is_object($category)): ?>
    <h1>Editar categoria <?=$category->name;?></h1>
    <?php $url_action = base_url."category/save&id=$category->id"; ?>
  <?php else: ?>
    <h1>Crear categoria</h1>
    <?php $url_action = base_url."category/save"; ?>
  <?php endif; ?>

  <form action="<?=$url_action?>" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" value="<?=$category->name?>" required>

    <input type="submit" value="Crear">
  </form>
</div>