<?php
session_start();
include("connections.php");

if (!isset($_GET['id_publication'])|| !isset($_SESSION['user_name'])) {
header("Location: ../index.php?ocultar=true#home");
echo "no me trajiste nada";

} else{
$id_publication = $_GET['id_publication'];
$user_name =$_SESSION['user_name'];
$comment =$_POST['comment_text'];


$insert_comment = "INSERT INTO comments (user_name , comment ,  id_publication) VALUES ('$user_name' , '$comment', '$id_publication')";

 $comment_result = mysqli_query($conexion,$insert_comment) or die (mysqli_error($conexion));


      if($comment_result){
      	 	header("Location: screen_publication.php?id_publication=$id_publication#comments");


      	 echo "Se inserto piola";
      	 echo $id_publication;

      } else{
      		header("Location: screen_publication.php?id_publication=$id_publication#comments");
      		echo "no inserte nada";

      }

 }/*Cierra else !isset*/ 
  ?>