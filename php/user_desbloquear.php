<?php
session_start();

include("connections.php");


 if (!isset($_GET['user'])) {

      header("Location: ../index.php?ocultar=true#home");

  }/*Cierro el if!isset*/
  else{
    $user_bloq = $_GET['user'];

    if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 )){
      

      
      $a="UPDATE usuarios_filtrados
           SET   state = 0
          WHERE user_name = '$user_bloq'  ";

      /*Traeme*/
      $consulta = mysqli_query($conexion,$a) or die (mysqli_error($conexion));


      if($consulta){
     /*    header("Location: ../index.php?ocultar=true#home");*/
            header("Location: screen_user.php?user=$user_bloq");
              echo $a;
              echo "ccago fuegooo";
                  

            
                  }/*Cierro el if Consulta*/else{/*
                     header("Location: ../index.php?ocultar=true#home");*/
                                    echo "fallo la consulta";
                  }
                  }/*Cierro el alto bardo*/

     }/*Cierro el else if!isset*/
 ?>