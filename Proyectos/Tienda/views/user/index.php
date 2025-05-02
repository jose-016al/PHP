<div id="primary">
  <h1>Gestionar usuarios</h1>

  <?php  if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">Usuario eliminado correctamente</strong>
  <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
    <strong class="alert_red">Eliminación de usuario fallido</strong>
  <?php endif; ?>
  <?php Utils::deleteSession('delete'); ?>

  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Email</th>
      <th>Rol</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
    <?php while($user = $users->fetch_object()):?>
      <tr>
        <td><a href="<?= base_url ?>user/profile&id=<?= $user->id ?>"><?= $user->id ?></a></td>
        <td><?=$user->first_name;?></td>
        <td><?=$user->last_name;?></td>
        <td><?=$user->email;?></td>
        <td><?=$user->role;?></td>
        <?php $status = $user->status == 1 ? 'activo' : 'inactivo' ?>
        <td><?=$status ?></td>
        <td>
          <a href="<?=base_url?>user/update&id=<?=$user->id?>" class="button button-actions">Editar</a>
          <a href="<?=base_url?>user/delete&id=<?=$user->id?>" class="button button-actions button-red">Eliminar</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</div>