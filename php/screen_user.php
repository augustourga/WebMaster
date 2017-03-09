<?php
  session_start();

include("connections.php");


 if (!isset($_GET['user'])) {

      header("Location: ../index.php#home");

  }/*Cierro el if!isset*/
  else{
      $user_profile = $_GET['user'];
/*
      $conexion = mysqli_connect('localhost','root','augus32311213','agenda_online') or die ("Error en la conexion");*/
      $a=" SELECT usuarios_filtrados.user_name , usuarios_filtrados.name , usuarios_filtrados.last_name , usuarios_filtrados.mail, usuarios_filtrados.image_profile , usuarios_filtrados.description FROM usuarios_filtrados WHERE user_name = '$user_profile' ";

      /*Traeme*/
      $consulta = mysqli_query($conexion,$a) or die (mysqli_error($conexion));


      if($consulta){


            $cant_reg_consulta= mysqli_num_rows($consulta);

               if ($cant_reg_consulta>0) {

                        $user_dates = mysqli_fetch_row($consulta);

                          /* user_name , name , last_name , mail, image_profile , description */

                          /*   0           1        2        3        4                   5           /
                         

                    /*Cierro el if $cant_reg_consulta>0*/}else{
                      echo "no traje nada";
                      header("Location: ../index.php?ocultar=true#home");

                    }
                  }/*Cierro el if Consulta*/else{
                                    echo "fallo la consulta";
                                    header("Location: ../index.php?ocultar=true#home");
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

  <body class="screen_user">


    <div class="contenido" >

      <video autoplay muted loop id="videoby">

        <source src="../img/backgrounds/audioSpectrum.mp4" type="video/mp4">
      </video>
      <!--=============== HEADER =================-->

      <div class="header">
        <div class="header-logo">

          <img src="../img/logo/logoblack.jpg" alt="Logo">

        </div>
        <div class="header-center">

          <h2>Ante Meridiem</h2>
          <p> La agenda nocturna de Chivilcoy</p>

        </div>
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

              } else {
                    ?>

          <img src="../img/images/icon-user.png" alt="User">
          <form method="POST" action="login.php" >
            <label class="user">
              <input type="text" placeholder="User" name="user_name" required>
            </label>

            <br>

            <label class="password">
              <input type="password" placeholder="Password" name="password" required>
            </label>

          <br>

          <button type="submit" name="acceder" value="acceder">
            Acceder
          </button>

            <a href="screen_register.php">  Registrarse </a>

          </form>
              <?php

                  }

                  ?>



        </div> <!-- Cierra LOGIN-->

        </div> <!-- Cierra HEADER -->

    <!-- ================ BUSCADOR ======================-->

        <div class="buscador">

            <form action="" method="">
                <input class="busqueda" type="" placeholder="Ingrese aqui su busqueda" required>
                <input type="submit" value="Buscar">
              </form>
        </div>

     <h2 class="back"> <a href="http://localhost/WebMaster/index.php?ocultar=true#home"> < Volver al Home </a> </h2>s

      <!-- ================== MAIN-CONTENT =============-->

  

         <!-- =============ADMINISTRAR PUBLICACION======== -->
       <?php   
       if (isset($_GET["estado"])&&$_GET["estado"] == "bloqueado" ) {
          ?>
                          <script type="text/javascript">
                              window.alert("Usuario Bloqueado");
                          </script>

                                  <?php

       }

               if ( (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 ))) {
                          ?>

           <div class="panel_admin_publication">
        
             <a href="user_delete.php?user=<?php echo $user_dates[0]; ?>">Borrar </a><br>
             <a href="user_edit.php?user=<?php echo $user_dates[0]; ?>">Editar </a><br>
             <a href="user_bloquear.php?user=<?php echo $user_dates[0]; ?>">Bloquear</a><br>
             <a href="screen_user_password.php?user=<?php echo $user_dates[0]; ?>">Cambiar contraseña</a><br>

        
          </div>    
          <?php

        }else {  if((isset($_SESSION['user_name']) && 
                    ($_SESSION['user_name'] ==$user_dates[0] )) ) {

              ?>
           <div class="panel_user_publication">
        
              
              <a href="user_edit.php?user=<?php echo $publicacion[0]; ?>">Editar </a><br>
              <a href="screen_user_password.php?user=<?php echo $user_dates[0];?>">Cambiar contraseña</a><br>
              <a href="user_delete.php?user=<?php echo $user_dates[0]; ?>">Borrar </a><br>
        
          </div>

        <?php }
        }  ?>

      <!-- ============= FIN ADMINISTRAR PUBLICACION=== -->
 


  <!-- 
                          /* user_name , name , last_name , mail, image_profile , description */

                          /*   0           1        2        3        4                   5           /
 -->
      <div class="user-content">

          <div class="user-profile">

            <div class="user-image">

            <?php if(isset($user_dates[4])) { 
                      if ($user_dates[4]!== NULL && $user_dates[4]!== '' ) {
                        ?>
                          <img src="../<?php  echo $user_dates[0]; ?>" alt="user image">
                       <?php
                       }else { ?>

                          <img src="../img/images/icon-user.png" alt="user image">
           
                       <?php }
                        }else {
                          ?>
                           <img src="../img/images/icon-user.png" alt="user image">
                          <?php             
                                       } ?>
           </div>

            <div class="user-header">
              <h2> <?php  echo $user_dates[0]; ?></h2>
              <h3> Description: </h3>

              <div class="user-description">
             <p> <?php  echo $user_dates[0]; ?> </p>

              </div>


            </div>
 <!-- ================== USER CREATED EVENTS ==================== -->
            <div>
              <h2 >Eventos de <?php  echo $user_dates[0]; ?> </h2>
            </div>
            <div class="user-information">

                           

                                    <?php
                         $consulta_mis_eventos=" SELECT publicaciones.id_publication , publicaciones.user_name , publicaciones.title , publicaciones.description , publicaciones.text , publicaciones.address , publicaciones.date_initiation , publicaciones.date_end , publicaciones.gender, COUNT( DISTINCT(i.user_name)) AS interesados , COUNT(DISTINCT(a.user_name)) AS asistentes, publicaciones.image FROM publicaciones AS publicaciones
                            LEFT OUTER JOIN assistants AS a USING(id_publication)
                            LEFT OUTER JOIN interested AS i USING(id_publication)
                            WHERE publicaciones.user_name = '$user_profile' 
                            GROUP BY id_publication";

            /*Traeme*/
            $consulta = mysqli_query($conexion,$consulta_mis_eventos) or die (mysqli_error($conexion));

            $estado_mis_eventos = mysqli_num_rows($consulta);


                if ($estado_mis_eventos>0) {
                  ?>
                   
                      <div id="slideshow-container">
                      <div id="slideshow">
                      <?php
                while ($publicacion =mysqli_fetch_row($consulta)) {
                       /*  /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes img*/

                          /*   0                   1        2           3        4       5            6               7          8        9             10 *     11/*/
                  ?>




                        <div id="box1">
                          <div class="MyEventsImg">
                              <img src="../<?php echo $publicacion[11];  ?>">
                              <p> <?php echo $publicacion[6];  ?> </p>
                          </div>

                          <div class="infoEvent">
                            <h2> <?php echo $publicacion[2];  ?> </h2>
                            <p> <?php echo $publicacion[4];  ?>.</p>
                            <span><a href="screen_publication.php?id_publication=<?php echo $publicacion[0];  ?>"> Mas info </a></span>

                          </div>

                        </div>




                       <?php
                    }/*cierra el while ($publicacion =mysqli_fetch_row($publicaciones))*/
                              ?>
                              </div>  <!--CIERRA SLIDESHOW -->
                              </div> <!-- CIERRA SLIDESHOW-CONTAINER -->
                              <?php
                   }/*Cierra el  if ($estado_publicacion)*/ else{

                    ?>
                        

                    </div><!-- Cierra Home-text -->

                <div id="slideshow-container">
                      <div id="slideshow">
                        <div id="box1">
                          <div class="MyEventsImg">
                              <img src="../img/images/jack.jpeg">
                              <p> Agrega publicaciones </p>
                          </div>

                          <div class="infoEvent">
                            <h2> Gil </h2>
                            <p> bobo.</p>
                            <span><a > Mas info Llena la cancha </a></span>

                          </div>

                        </div>

                     </div>  <!--CIERRA SLIDESHOW -->
                    </div> <!-- CIERRA SLIDESHOW-CONTAINER -->




                    <?php
                   }
                   ?>


                </div>



      </div>


      <div class="break-user">

      </div>

  

      <!-- ================== FIN USER CREATED EVENTS ==================== -->






    <!-- ================== FOOTER ================-->

    <div class="footer">

      <ul>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">Contacto |</a></li>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">Sobre Ante Merídiem  |</a></li>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">Ayuda  |</a></li>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">Legales  |</a></li>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">Politica de Privacidad  |</a></li>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">© Copyright 2017  </a></li>
      </ul>

    </div>
    </body>




    </html>
