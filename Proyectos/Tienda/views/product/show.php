<div id="primary">
  <?php if (isset($product)): ?>
    <h1><?= $product->name ?></h1>

    <div id="detail-product">
      <div class="image">
        <?php if ($product->image != null): ?>
          <img src="<?= base_url ?>uploads/images/<?= $product->image ?>">
        <?php else: ?>
          <img src="<?= base_url ?>assets/img/camiseta.png" alt="">
        <?php endif; ?>
      </div>
      <div class="data">
        <p><?= $product->description?></p>
        <p><?= $product->price ?>€</p>
        <?php if($product->stock != 0): ?>
          <a href="<?=base_url?>cart/add&id=<?=$product->id?>" class="button">Comprar</a>
        <?php else: ?>
          <h1 class="stock">SIN STOCK</h1>
        <?php endif; ?>
      </div>
    </div>
  <?php else: ?>
    <h1>El producto no existe</h1>
  <?php endif; ?>
</div>