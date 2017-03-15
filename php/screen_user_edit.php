<?php
  session_start();

include("connections.php");


 if (!isset($_GET['user'])|| !isset($_SESSION['user_name'])) {

    /*  header("Location: ../index.php?ocultar=true#home");*/

  }/*Cierro el if!isset*/
  else{
      if ($_GET['user']!== $_SESSION['user_name']) {
  /*header("Location: ../index.php?ocultar=true#home");*/
     } else{


      $user_profile = $_GET['user'];

      $a=" SELECT usuarios_filtrados.user_name , usuarios_filtrados.name , usuarios_filtrados.last_name , usuarios_filtrados.mail, usuarios_filtrados.image_profile , usuarios_filtrados.description, usuarios_filtrados.state FROM usuarios_filtrados WHERE user_name = '$user_profile' ";

      /*Traeme*/
      $consulta = mysqli_query($conexion,$a) or die (mysqli_error($conexion));


      if($consulta){


            $cant_reg_consulta= mysqli_num_rows($consulta);

               if ($cant_reg_consulta>0) {

                        $user_dates = mysqli_fetch_row($consulta);

                          /* user_name , name , last_name , mail, image_profile , description, state */

                          /*   0           1        2        3        4                   5      6     /
                         

                    /*Cierro el if $cant_reg_consulta>0*/}else{
                      echo "no traje nada";
                      header("Location: ../index.php?ocultar=true#home");

                    }
                  }/*Cierro el if Consulta*/else{
                                    echo "fallo la consulta";
                                    header("Location: ../index.php?ocultar=true#home");
                  }

              }
     }/*Cierro el else if!isset*/

 ?>
<!DOCTYPE html>

<html lang="es">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/logo/favicon.ico">
    <title> Ante Meridiem </title>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Six+Caps" rel="stylesheet">

  </head>

  <body>


    <div class="contenido registro" >

      <video autoplay muted loop id="videoby">

        <source src="../img/backgrounds/audioSpectrum.mp4" type="video/mp4">
      </video>
      <!--=============== HEADER =================-->

      <div class="header">
        <div class="header-logo">

          <img src="../img/logo/logoblack.jpg" alt="Logo">

        </div>
        <a href="../index.php?ocultar=true#home">
          <div class="header-center">

            <h2>Ante Meridiem</h2>
            <p> La agenda nocturna de Chivilcoy</p>

          </div>
        </a>
        <div class="header-login">

         <?php    if(isset($_SESSION['user_name']))  {

              ?>
             <!-- Cerrar sesion</button> -->
                <ul class="show_name">

                    <li>
                      <a href="screen_user.php?user=<?php echo $_SESSION['user_name'];
                         ?>"><?php echo $_SESSION['user_name'];
                         ?>                   </a>
                    </li>
                    <input type="button" id="button_close_session" value="Cerrar Sesión">

                 </ul>

                   <script type="text/javascript">

                     function redirect_unlogin(){
                     window.location.href= 'unlogin.php';
                    }

                    var button_close_session = document.getElementById("button_close_session");
                    button_close_session.addEventListener("click", redirect_unlogin);

                      </script>
            <!--  TERMINA Cerrar sesion</button> -->

              <?php

              }?>

        </div> <!-- Cierra LOGIN-->

        </div> <!-- Cierra HEADER -->

    <!-- ================ BUSCADOR ======================-->


      <!-- ================== REGISTRO =============-->

      <h2 class="back"> <a href="../index.php#home"> < Volver al Home </a> </h2>


      <div class="formulario" id="formularioRegistro">
       <!--     /* user_name , name , last_name , mail, image_profile , description, state */

                 /*   0           1        2        3        4                   5      6     / -->
                         

          
        <h2> Editar información </h2>
        <form method="POST" action="user_edit.php" enctype="multipart/form-data">
          <label class="user-name">
            <span> Nombre </span>
            <br>
            <input type="text" placeholder="" name="name" required value="<?php echo $user_dates[1]; ?>">
          </label>

          <br>

          <label class="nombre">
              <span>Apellido </span>
              <br>
              <input type="text" placeholder="" name="last_name" required value="<?php echo $user_dates[2]; ?>">
          </label>

          <br>

          <label class="Apellido"> 
              <span> Descripcion </span>
              <br>
              <textarea name="description"><?php echo $user_dates[5]; ?></textarea>
          </label>


          <br>

          <label class="profileImage">
              <span> Imagen de perfil </span>
              <br>
              <input type="file"  name="profile_image" >
          </label>

          <br>
          <div class="registro-buttons">
            <button type="reset" id="" onclick="">Cancelar</button>
            <button type="submit" id="">Confirmar</button>
          </div>
        </form>
          

      </div> <!-- Cierra REGISTRO -->


    </div> <!-- CIERRA CONTENIDO ======-->




    <!-- ================== FOOTER ================-->

    <div class="footer">

      <ul>
        <li><a href="screen_footer.php">Contacto |</a></li>
        <li><a href="screen_footer.php">Sobre Ante Merídiem  |</a></li>
        <li><a href="screen_footer.php">Ayuda  |</a></li>
        <li><a href="screen_footer.php">Legales  |</a></li>
        <li><a href="screen_footer.php">Politica de Privacidad  |</a></li>
        <li><a href="screen_footer.php">© Copyright 2017  </a></li>
      </ul>

    </div>

    </body>




    </html>
