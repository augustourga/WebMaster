<?php
session_start();
//Houston we have a problem: Cuando creamos usuarios con el mismo mail se rompe, ya que el mail debe ser único, entonces hay que validar al registrarse


$user_name =$_GET['id'];
$validation_code = $_POST['validation_code'];

$conexion = mysqli_connect('localhost','root','augus32311213','agenda_online') or die ("Error en la conexion");
$consulta = mysqli_query($conexion,"SELECT user_name, state, password, mail, name,last_name FROM usuarios WHERE user_name='$user_name' AND validation_code= '$validation_code'");


if($consulta){

$cant_reg_consulta= mysqli_num_rows($consulta);

	if ($cant_reg_consulta>0) {
		//no esta piola hacer un while porque devuelve un solo registro
			$fila = mysqli_fetch_row($consulta); 
			
			//User name,state,password,mail,name,last_name
			$datos[0]= $fila[0];
			$datos[1]= $fila[1];
			$datos[2]= $fila[2];
			$datos[3]= $fila[3];
			$datos[4]= $fila[4];
			$datos[5]= $fila[5];
	
		$a= "INSERT INTO usuarios_filtrados  ( user_name, state, type, password, mail, name , 	last_name) values ('$datos[0]' , $datos[1] , 0 , '$datos[2]' , '$datos[3]' , '$datos[4]' , '$datos[5]'  )";
			$consulta2 = mysqli_query($conexion ,$a);
			
			if($consulta2){

				echo "Se inserto el usuario corhrectamente";
				//Ya esta hecho el trigger, falta mostrar alguna ventanita que diga usuario creado correctamente
						 header("Location: http://localhost/WebMaster/php/screen_register.php?formulario_estado=ok&id=$user_name&codigo_validacion=true");
				
				//header("Location: http://localhost/WebMaster/index.php");
				}else{

					echo $a;
						// header("Location: http://localhost/WebMaster/index.php?formulario_estado=ok&id=$user_name&codigo_validacion=false");
					
			echo "falló el insert";
			header("Location: http://localhost/WebMaster/index.php");

			}
			
			

			}else{
					header("Location: http://localhost/WebMaster/php/screen_register.php?formulario_estado=ok&id=$user_name&codigo_validacion=false");

					 // echo "codigo de validacion incorrecto deberiamos volver a la página anterior (ingrese codigo)";
					}
		}else{ //error en la consulta
			// header("Location: http://localhost/WebMaster/index.php?formulario_estado=ok&id=$user_name");
			header("Location: http://localhost/WebMaster/index.php");																																																																													

				}


?>