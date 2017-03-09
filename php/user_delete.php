<?php
session_start();

include("connections.php");


 if (!isset($_GET['user'])) {

      header("Location: ../index.php?ocultar=true#home");

  }/*Cierro el if!isset*/
  else{
    $user_delete = $_GET['user'];

    $b ="SELECT usuarios_filtrados.user_name , usuarios_filtrados.image_profile FROM usuarios_filtrados 
         WHERE usuarios_filtrados.user_name = '$user_delete'";

    $consulta_b = mysqli_query($conexion,$b) or die (mysqli_error($conexion));

    $user_delete_dates = mysqli_fetch_row($consulta_b);

    if((isset($_SESSION['user_name']) && 
                    ($_SESSION['user_name'] ==$user_delete_dates[0] )) || (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 ))) {
      
/*Tendriamos que ver como borrar la imagen*/
      if ($user_delete_dates[1] !== NULL) {
         unlink("../$user_delete_dates[1]");
      }
      
      $a="DELETE FROM usuarios_filtrados WHERE usuarios_filtrados.user_name= '$user_delete' ";

      /*Traeme*/
      $consulta = mysqli_query($conexion,$a) or die (mysqli_error($conexion));


      if($consulta){
     /*    header("Location: ../index.php?ocultar=true#home");*/
              echo $a;
              echo "ccago fuegooo";
                  

            
                  }/*Cierro el if Consulta*/else{/*
                     header("Location: ../index.php?ocultar=true#home");*/
                                    echo "fallo la consulta";
                  }
                  }/*Cierro el alto bardo*/

     }/*Cierro el else if!isset*/
 ?>