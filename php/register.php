<?php
include('functions.php');

include("connections.php");


session_start();

$user_name = $_POST['user_name'];
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$mail = $_POST['mail'];
$password = md5($_POST['password']);
$validation_code = getRandomCode();


if (!isset($_POST['user_name'])) {
	header("Location: ../index.php#home");
		
	
}else{

$consulta = mysqli_query($conexion,"SELECT * FROM usuarios_filtrados WHERE user_name='$user_name' OR mail='$mail'");


if($consulta){

$cant_reg_consulta= mysqli_num_rows($consulta);

	if ($cant_reg_consulta>0) {

		//existe el usuario, ingrese otro nombre de usuario	
		
			header("Location: screen_register.php?formulario_estado=existemail");
	echo "existe el usuario o ya ha sido creado un usuario con esa direccion de e-mail, ingrese otro nombre de usuario	";

	}
		else{
 					$mensaje = sendEmail($mail, $validation_code);
			if($mensaje){
				//Usuario válido y mensaje enviado
			
	
			$consulta = mysqli_query($conexion ,"INSERT INTO usuarios ( user_name ,name, last_name, mail, state , password , validation_code) values ('$user_name' , '$name' , '$last_name' , '$mail' , 0 , '$password' , '$validation_code' ) ");
			if($consulta){
			echo "Usuario válido y mensaje enviado";
				header("Location: screen_register.php?formulario_estado=ok&id=$user_name&mail=$mail");
				}else{
				echo "falló el insert";
				header("Location: ../index.php#home");

			}
			}else{
			//Usuario válido y mensaje no enviado
			header("Location: screen_register.php?formulario_estado=mensajeerror");
			echo "Usuario válido y mensaje no enviado";

//enviar mail con $validation_code y redireccionar a una pestaña donde deba ingresar el validation code una vez ingresado y validado, se guardan todos los datos en la tabla usuarios_filtrados
 			}


} 
}		else {

	echo "error en la consulta";
	header("Location: ../index.php#home");
	

			}
}	
  ?>