<?php

// echo "entro al script php hola christian";

$mysqli = new mysqli("mysql_db_apiphp:3306", "root", "animales#", "animales");
if($mysqli->connect_errno){
    die("Falla en la conexión ". mysqli_connect_error());
}

$consulta = "SELECT * FROM mascota";
$resultado = $mysqli->query($consulta);

echo "<h2>Mascotas</h2>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<ul>";
    echo "<li> id = " . $fila['id'] . "</li>";
    echo "<li> nombre = " . $fila['nombre'] . "</li>";
    echo "</ul>";
}

echo $mysqli->host_info . "\n";

