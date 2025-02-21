<?php
  // Conectar a la base de datos
$conexion = mysqli_connect("localhost", "user", "user", "phpmysql");

  // Comprobar si la conexion es correcta
if (mysqli_connect_errno()) {
  echo "La conexión con la base de datos ha fallado" . mysqli_connect_errno();
} 

  // Consutla para modificar la codificacion de caracteresÇ
mysqli_query($conexion, "SET NAMES 'utf8'");

  // Consutla SELECT desde php
$query = mysqli_query($conexion, "SELECT * FROM nota");

while($nota = mysqli_fetch_assoc($query)) {
  echo "<h2>ID: ".$nota['id'].'</h2>';
  echo "Titulo: ".$nota['titulo'].'<br/>';
  echo $nota['descripcion'].'<br/>';
  echo $nota['color'].'<br/>';
}

echo "<hr>";

$sql = "INSERT INTO nota VALUES(null, 'Nota 3', 'nota 3', 'blue')";
$insert = mysqli_query($conexion, $sql);
if ($insert) {
  echo "Guardado";
}
?>