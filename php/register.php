<?php
session_start();

$user_name = $_POST['user_name'];
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$mail = $_POST['mail'];
$password = $_POST['password'];
// $validation_code = generate();

$consulta = mysqli_query($_SESSION['conexion'],"SELECT * FROM usuarios_filtrados WHERE user_name='$user_name'");

if($consulta){

$cant_reg_consulta= mysqli_num_rows($consulta);

	if ($cant_reg_consulta>0) {
//existe el usuario, ingrese otro nombre de usuario	

	}
		else{
 
$consulta = mysqli_query($_SESSION['conexion'],"INSERT INTO usuarios ( user_name , state , password , validation_code) values ('$user_name' ',' '1' ',' '$password' ',' 
	'$validation_code' ) ");

//enviar mail con $validation_code y redireccionar a una pestaña donde deba ingresar el validation code una vez ingresado y validado, se guardan todos los datos en la tabla usuarios_filtrados
 			}


//header("Location: http://localhost/WebMaster/index.php");

} 		else {

	echo "error en la consulta";
	
	//para cerrar sesion --> session_destroy();
	//header("Location: http://localhost/WebMaster/index.php");
	

			}

  ?>