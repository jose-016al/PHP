<div id="primary">
  <?php if(isset($edit) && isset($product) && is_object($product)): ?>
    <h1>Editar producto <?=$product->name;?></h1>
    <?php $url_action = base_url."product/save&id=$product->id"; ?>
  <?php else: ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url."product/save"; ?>
  <?php endif; ?>

  <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
    <label for="name">Nombre</label>
    <input type="text" name="name" value="<?=isset($product) && is_object($product) ? $product->name : '';?>">

    <label for="description">Descripción</label>
    <textarea name="description"><?=isset($product) && is_object($product) ? $product->description : '';?></textarea>

    <label for="price">Precio</label>
    <input type="text" name="price" value="<?=isset($product) && is_object($product) ? $product->price : '';?>">

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?=isset($product) && is_object($product) ? $product->stock : '';?>">

    <label for="category">Categoria</label>
    <?php $categories = Utils::showCategories(); ?>
    <select name="category">
      <?php while ($cat = $categories->fetch_object()): ?>
        <option value="<?= $cat->id ?>" <?=isset($product) && is_object($product) && $cat->id == $product->category_id ? 'selected' : '';?>>
          <?= $cat->name ?>
        </option>
      <?php endwhile; ?>
    </select>

    <label for="image">Imagen</label>
    <?php if(isset($product) && is_object($product) && !empty($product->image)): ?>
      <img src="<?=base_url?>uploads/images/<?=$product->image?>" class="thumb">
    <?php endif; ?>
    <input type="file" name="image">

    <input type="submit" value="Añadir">
  </form>
</div>