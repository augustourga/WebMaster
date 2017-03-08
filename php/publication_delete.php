<?php
session_start();

include("connections.php");


 if (!isset($_GET['id_publication'])) {

      header("Location: ../index.php#home");

  }/*Cierro el if!isset*/
  else{
      $id_publication = $_GET['id_publication'];
/*
      $conexion = mysqli_connect('localhost','root','augus32311213','agenda_online') or die ("Error en la conexion");*/
      $a=" DELETE FROM publicaciones WHERE id_publication= '$id_publication' ";

      /*Traeme*/
      $consulta = mysqli_query($conexion,$a) or die (mysqli_error($conexion));


      if($consulta){
         header("Location: ../index.php#home");
 echo "consulta exitosa";
                  

            
                  }/*Cierro el if Consulta*/else{
                     header("Location: ../index.php#home");
                                    echo "fallo la consulta";
                  }

     }/*Cierro el else if!isset*/
 ?>