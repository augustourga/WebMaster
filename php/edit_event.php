<?php 

include("connections.php");


session_start();

if( isset($_SESSION["user_name"])&& isset($_POST['title'])){

$user_name = $_SESSION["user_name"];
$id_publication = $_GET['id_publication'];
$description = $_POST["description"];
$text = $_POST["text"];	
$address = $_POST["address"];
$title = $_POST["title"];
$date_initiation =$_POST["date_initiation"];
$date_end =$_POST["date_end"];
$gender =$_POST["gender"];

/*$fecha_actual = new DateTime();

 

$fecha_actual_ts = $fecha_actual->getTimestamp();
*/
/*Imagen*/

 $imagen = $_FILES['image']['name'];
 $ruta = $_FILES['image']['tmp_name'];
 $destino = "../img/images/events_img/".$imagen;

  if ($imagen !== "") {
  	copy($ruta,$destino); 
  $ruta_mysql ="img/images/events_img/".$imagen;;
      } else{ 
      	 $ruta_mysql ="";
      }
      
  

/*Deberiamos validar que - la fecha del evento no es una fecha pasada. 
						 - Acotar las fechas
						 - */
$a =" UPDATE publicaciones
 SET   title ='$title', description = '$description' , text = '$text' , address  = '$address' , date_initiation = '$date_initiation' , date_end = '$date_end' , gender = '$gender', image ='$ruta_mysql'
  WHERE id_publication = '$id_publication'"; 


 $b ="SELECT  id_publication FROM publicaciones WHERE  user_name='$user_name' ORDER BY date_emit DESC";
 	/*
 $conexion = mysqli_connect('localhost','root','augus32311213','agenda_online') or die ("Error en la conexion");*/
$consulta = mysqli_query($conexion, $a);

$consulta1 = mysqli_query($conexion, $b);
	if($consulta){ 
		if ($consulta1) {
				echo "Consulta exitosaaaaaaa";
				$cant_reg_consulta= mysqli_num_rows($consulta1);
				if ($cant_reg_consulta>0) {
					
					$fila = mysqli_fetch_row($consulta1);
		
					$codigo_publicacion = $fila[0];
					
					header("Location: screen_publication.php?id_publication=$codigo_publicacion");
					
				}/*Cierro el if ($cant_reg_consulta>0) */
				else{	
					echo "no traje nada";
				}/*Cierro  else el if ($cant_reg_consulta>0)*/
			}/*Cierro el if ($consulta1) */ 
		else{
				echo "Consulta erronea" . "sarasa" . $b ;
			/*	header("Location: publication_edit.php?code='errorInsert'");
*/
	}/*Cierro el else if ($consulta1) */
}/*Cierro el  if ($consulta) */
else{	
	
/*	header("Location: publication_edit.php?code='errorInsert'");*/

}/*Cierro el else if ($consulta)*/
	}/*Cierro el if isset $_SESSION*/
 ?>}
