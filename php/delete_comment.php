<?php
session_start();
include("connections.php");

if (!isset($_GET['id_publication'])|| !isset($_GET['id_comments'])|| !isset($_SESSION['user_name'])) {
header("Location: ../index.php?ocultar=true#home");
echo "no me trajiste nada";

} else{
$id_publication = $_GET['id_publication'];
$id_comments =$_GET['id_comments'];
$user_name =$_SESSION['user_name'];



$delete_comment = "DELETE FROM comments WHERE comments.id_comments = $id_comments ";

 $comment_result = mysqli_query($conexion,$delete_comment) or die (mysqli_error($conexion));


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