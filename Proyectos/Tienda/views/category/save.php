<div id="primary">
  <h1>Crear categoria</h1>

  <form action="<?=base_url?>category/save" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" required>

    <input type="submit" value="Crear">
  </form>
</div>