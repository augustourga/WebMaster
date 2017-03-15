<?php 

include("connections.php");


session_start();

if( isset($_SESSION["user_name"])&& isset($_POST['name'])){

$user_name = $_SESSION["user_name"];
$description = $_POST["description"];
$name = $_POST["name"];	
$last_name = $_POST["last_name"];

/*Imagen*/
if (file_exists($_FILES['profile_image']['tmp_name']) || is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
 $imagen = $_FILES['profile_image']['name'];
 $ruta = $_FILES['profile_image']['tmp_name'];
 $destino = "../img/images/user_img/".$imagen;
 echo "IMAGEN " .$imagen;

 copy($ruta,$destino); 
 $ruta_mysql ="img/images/user_img/".$imagen;
         
      }
      else{
      	  $ruta_mysql = NULL;
      }
  


/*Deberiamos validar que - la fecha del evento no es una fecha pasada. 
						 - Acotar las fechas
						 - */
 $a ="UPDATE usuarios_filtrados
 SET  name ='$name' , last_name = '$last_name' , description = '$description' , image_profile ='$ruta_mysql'
  WHERE user_name = '$user_name'"; 
;
 

$consulta1 = mysqli_query($conexion, $a);
	if($consulta){ 
			header("Location: screen_user.php?user=$user_name");
}/*Cierro el  if ($consulta) */
else{	
	
	header("Location: screen_user.php?user=$user_name");

}/*Cierro el else if ($consulta)*/
}/*Cierro el if isset $_SESSION*/
else{
	  header("Location: ../index.php?ocultar=true#home");

}
 ?>

