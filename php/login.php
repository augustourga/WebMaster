<?php  


include("connections.php");






if (!isset($_POST['user_name'])) {
	header("Location: ../index.php#home");
		
	# code...
}else{
	$user_name = $_POST['user_name'];
	$password = md5($_POST['password']);

$consulta = mysqli_query($conexion,"SELECT user_name, type, state, mail FROM usuarios_filtrados WHERE ( user_name='$user_name' OR mail ='$user_name') AND password='$password'") or die (mysqli_error($conexion));
	
if($consulta){
$cant_reg_consulta= mysqli_num_rows($consulta);

	if ($cant_reg_consulta>0) {


		while ($fila = mysqli_fetch_row($consulta)) { 
			
			//User name, type, state, mail
			$datos[0]= $fila[0];
			$datos[1]= $fila[1];
			$datos[2]= $fila[2];
			$datos[3]= $fila[3];
			}

		if ($datos[2]==1) {
	
				//usuario bloqueado 
		header("Location: ../index.php?ocultar=true&estado=bloqueado#home");
					exit;			
		}else{
				//usuario válido
		session_start();		
		$_SESSION['user_name'] = $datos[0];
		$_SESSION['user_type'] = $datos[1];
		$_SESSION['user_state'] = $datos[2];
		$_SESSION['user_mail'] = $datos[3];
		$_SESSION['conexion']= $conexion;
	
		echo "conectado usuario:" .$_SESSION['user_name'];
		header("Location: ../index.php#home");
		exit;
}
		
	}

		else{ 
				//usuario incorrecto
			echo "usuario incorrecto";


			header("Location: ../index.php?ocultar=true&estado=error#home");

			exit;			
 			
			}


exit;

} 		else {
				//error en el select
			echo "error en la consulta";
	

			header("Location: ../index.php#home");
		
exit;
			} 
				}
 ?>