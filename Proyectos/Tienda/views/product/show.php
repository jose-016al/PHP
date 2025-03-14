<div id="primary">
  <?php if (isset($pro)): ?>
    <h1><?= $pro->name ?></h1>

    <div id="detail-product">
      <div class="image">
        <?php if ($pro->image != null): ?>
          <img src="<?= base_url ?>uploads/images/<?= $pro->image ?>">
        <?php else: ?>
          <img src="<?= base_url ?>assets/img/camiseta.png" alt="">
        <?php endif; ?>
      </div>
      <div class="data">
        <p><?= $pro->description?></p>
        <p><?= $pro->price ?>€</p>
        <a href="<?=base_url?>cart/add&id=<?=$pro->id?>" class="button">Comprar</a>
      </div>
    </div>
  <?php else: ?>
    <h1>El producto no existe</h1>
  <?php endif; ?>
</div>