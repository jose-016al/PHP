<div id="primary">
  <?php if (isset($user)): ?>
    <h1>Perfil</h1>

    <div id="detail-product">
      <div class="image">
        <?php if ($user->image != null): ?>
          <img src="<?= base_url ?>uploads/images/<?= $user->image ?>">
        <?php else: ?>
          <img src="<?= base_url ?>assets/img/user.jpg" alt="">
        <?php endif; ?>
      </div>
      <div class="data">
        <p><strong>Nombre:</strong> <?= $user->first_name?></p>
        <p><strong>Apellidos:</strong> <?= $user->last_name?></p>
        <p><strong>Email:</strong> <?= $user->email?></p>
        <?php if(isset($_SESSION['admin'])): ?>
          <p><strong>Rol:</strong> <?= $user->role?></p>
          <?php $status = $user->status == 1 ? 'activo' : 'inactivo' ?>
          <p><strong>Estado:</strong> <?= $status?></p>
        <?php endif; ?>
      </div>
    </div>
  <?php else: ?>
    <h1>El usuario no existe</h1>
  <?php endif; ?>
</div>