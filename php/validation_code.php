<?php
session_start();
//deberia recibir el codigo y el nombre de usuario
$user_name =$_GET['user_name'];
$validation_code = $_GET['valor'];
echo $validation_code;


if (!isset($_GET['user_name'])) {
	header("Location: http://localhost/WebMaster/index.php#home");
		
	
}else{

$conexion = mysqli_connect('localhost','root','augus32311213','agenda_online') or die ("Error en la conexion");
$consulta = mysqli_query($conexion,"SELECT user_name, state, password, mail, name,last_name FROM usuarios WHERE user_name='$user_name' AND validation_code= '$validation_code'");

if($consulta){

$cant_reg_consulta= mysqli_num_rows($consulta);

	if ($cant_reg_consulta>0) {
		//no esta piola hacer un while porque devuelve un solo registro
		while ($fila = mysqli_fetch_row($consulta)) { 
			
			//User name,state,password,mail,name,last_name
			$datos[0]= $fila[0];
			$datos[1]= $fila[1];
			$datos[2]= $fila[2];
			$datos[3]= $fila[3];
			$datos[4]= $fila[4];
			$datos[5]= $fila[5];

			$consulta = mysqli_query($conexion ,"INSERT INTO usuarios_filtrados ( user_name, state, password, mail, name,last_name) values ('$datos[0]' , '$datos[1]' , '$datos[2]' , '$datos[3]' , '$datos[4]' , '$datos[5]'  ) ");
			if($consulta){
				echo "Se inserto el usuario correctamente";
				//Ya esta hecho el trigger, falta mostrar alguna ventanita que diga usuario creado correctamente
			
			//	header("Location: http://localhost/WebMaster/index.php");
				}else{
						//	header("Location: http://localhost/WebMaster/index.php");
					
			echo "falló el insert";

			}
			
			}

			}else{
	//codigo de validacion incorrecto deberiamos volver a la página anterior (ingrese codigo)
					}
		}else{ //error en la consulta

				}
}

?>