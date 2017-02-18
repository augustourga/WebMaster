<?php 

$_SESSION['conexion'] = mysqli_connect("localhost","root","augus32311213","agenda_online") or die ("Error en la conexion");



header(Location: "index.php");
 ?>