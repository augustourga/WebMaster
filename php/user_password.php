<?php 

include("connections.php");


session_start();

if( isset($_SESSION["user_name"])){

$user_name = $_SESSION["user_name"];
$user_password = $_GET["user"];
$old_password = md5($_POST['old_password']);
$new_password = md5($_POST["new_password"]);
$new_password1 = md5($_POST["new_password1"]);	

if( $new_password !== $new_password1 ){
	header("Location: screen_user_password.php?user=$user_password&password_estado=nocoinciden ");
}
else{

 $a ="SELECT  user_name FROM usuarios_filtrados WHERE  user_name='$user_password' AND password = '$new_password1'";
  
$b =" UPDATE usuarios_filtrados
 SET   password = '$new_password1'
  WHERE usuarios_filtrados.user_name = $user_password"; 



 	/*
 $conexion = mysqli_connect('localhost','root','augus32311213','agenda_online') or die ("Error en la conexion");*/
/**/

$consulta1 = mysqli_query($conexion, $a);
	
		if ($consulta1) {
				echo "Consulta exitosaaaaaaa";
				$cant_reg_consulta= mysqli_num_rows($consulta1);
				if ($cant_reg_consulta>0) {
					$consulta = mysqli_query($conexion, $a);
					if ($consulta){

					header("Location: screen_user_password.php?user=$user_password&password_estado=ok ");

					} else{

					header("Location: screen_user_password.php?user=$user_password ");

					}
				
					
				}/*Cierro el if ($cant_reg_consulta>0) */
				else{	
					echo "no traje nada";
				}/*Cierro  else el if ($cant_reg_consulta>0)*/
				else{

				header("Location: screen_user_password.php?user=$user_password&password_estado=oldpassword ");
				}
			}/*Cierro el if ($consulta1) */ 
		else{
				echo "Consulta erronea" . "sarasa" . $b ;
			/*	header("Location: publication_edit.php?code='errorInsert'");
*/
	}/*Cierro el else if ($consulta1) */
/*Cierro el  if ($consulta) */

	}/*Cierro el else password nocoinciden*/

	} else{
		header("Location: ../index.php?ocultar=true");
	}
 ?>
