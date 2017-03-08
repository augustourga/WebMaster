<?php 
/*session_start();*/


function im_interesting($id_publication ){
include("php/connections.php");
if(isset($_SESSION['user_name'])){
	$user_name = $_SESSION['user_name'];
	$consulta = mysqli_query($conexion,"SELECT id_interested FROM interested WHERE id_publication = '$id_publication' AND user_name ='$user_name'") or die (mysqli_error($conexion));
	
	if($consulta){
			$cant_reg_consulta= mysqli_num_rows($consulta);

		if ($cant_reg_consulta>0) {

				return true;
						    	}/*Cierra if cant_reg*/ 
		else{
				return false;
						    	}/*Cierra else cant_reg*/
					} /*Cierra if consulta*/
	else{
					return false;
				    }/*Cierra else if consulta*/




		}/*Cierra ifisset*/ else{
	return false;
	}/*Cierra else ifisset*/
}/*Cierra fubnction*/



function im_assistant($id_publication ){
include("php/connections.php");
if(isset($_SESSION['user_name'])){
	$user_name = $_SESSION['user_name'];
	$consulta = mysqli_query($conexion,"SELECT id_assistants FROM assistants WHERE id_publication = '$id_publication' AND user_name ='$user_name'") or die (mysqli_error($conexion));
	
	if($consulta){
			$cant_reg_consulta= mysqli_num_rows($consulta);

		if ($cant_reg_consulta>0) {

				return true;
						    	}/*Cierra if cant_reg*/ 
		else{
				return false;
						    	}/*Cierra else cant_reg*/
					} /*Cierra if consulta*/
	else{
					return false;
				    }/*Cierra else if consulta*/




		}/*Cierra ifisset*/ else{
	return false;
	}/*Cierra else ifisset*/
}/*Cierra fubnction*/

 function desinterest_me($id_publication){
	include("php/connections.php");
	if(isset($_SESSION['user_name'])){
		$user_name = $_SESSION['user_name'];
		$consulta = mysqli_query($conexion,"DELETE FROM interested WHERE id_publication = '$id_publication' AND user_name ='$user_name'
") or die (mysqli_error($conexion));
return;	

 }
}
 function interest_me($id_publication){
	include("php/connections.php");
	if(isset($_SESSION['user_name'])){
		$user_name = $_SESSION['user_name'];
		$consulta = mysqli_query($conexion," INSERT INTO interested (id_publication,user_name) VALUES ('$id_publication' , '$user_name')
") or die (mysqli_error($conexion));
return;	
 	
 }
}
 function desassitant_me($id_publication){
 		include("php/connections.php");
	if(isset($_SESSION['user_name'])){
		$user_name = $_SESSION['user_name'];
		$consulta = mysqli_query($conexion,"DELETE FROM assistants WHERE id_publication = '$id_publication' AND user_name ='$user_name'
") or die (mysqli_error($conexion));
return;	

 	
 }
}
 function assitant_me($id_publication){
 		include("php/connections.php");
	if(isset($_SESSION['user_name'])){
		$user_name = $_SESSION['user_name'];
		$consulta = mysqli_query($conexion," INSERT INTO assistants (id_publication,user_name) VALUES ('$id_publication' , '$user_name')
") or die (mysqli_error($conexion));
return;	
 }
}

 ?>
