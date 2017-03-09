<?php
session_start();

include("connections.php");


 if (!isset($_GET['id_publication'])) {

      header("Location: ../index.php?ocultar=true#home");

  }/*Cierro el if!isset*/
  else{
    $id_publication = $_GET['id_publication'];

    $b ="SELECT publicaciones.user_name , publicaciones.image FROM publicaciones 
         WHERE publicaciones.id_publication = '$id_publication'";

    $consulta_b = mysqli_query($conexion,$b) or die (mysqli_error($conexion));

    $publicacion = mysqli_fetch_row($consulta_b);

    if((isset($_SESSION['user_name']) && 
                    ($_SESSION['user_name'] ==$publicacion[0] )) || (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 ))) {
      
/*Tendriamos que ver como borrar la imagen*/
      if ($publicacion[1] !== NULL) {
         unlink("../$publicacion[1]");
      }
      
      $a=" DELETE FROM publicaciones WHERE id_publication= '$id_publication' ";

      /*Traeme*/
      $consulta = mysqli_query($conexion,$a) or die (mysqli_error($conexion));


      if($consulta){
         header("Location: ../index.php?ocultar=true#home");
 echo "consulta exitosa";
                  

            
                  }/*Cierro el if Consulta*/else{
                     header("Location: ../index.php?ocultar=true#home");
                                    echo "fallo la consulta";
                  }
                  }/*Cierro el alto bardo*/

     }/*Cierro el else if!isset*/
 ?>