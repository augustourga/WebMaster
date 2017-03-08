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
      $a=" SELECT publicaciones.id_publication , publicaciones.user_name , publicaciones.title , publicaciones.description , publicaciones.text , publicaciones.address , publicaciones.date_initiation , publicaciones.date_end , publicaciones.gender,  COUNT( DISTINCT(i.user_name)) AS interesados , COUNT(DISTINCT(a.user_name)) AS asistentes , publicaciones.image FROM publicaciones AS publicaciones
           LEFT OUTER JOIN assistants AS a USING(id_publication)
           LEFT OUTER JOIN interested AS i USING(id_publication)
           WHERE publicaciones.id_publication = '$id_publication'
          GROUP BY user_name ";

      /*Traeme*/
      $consulta = mysqli_query($conexion,$a) or die (mysqli_error($conexion));


      if($consulta){


            $cant_reg_consulta= mysqli_num_rows($consulta);

               if ($cant_reg_consulta>0) {

                        $publicacion = mysqli_fetch_row($consulta);

                          /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes img*/

                          /*   0                   1        2           3        4       5            6               7          8        9             10 *     11/
                          /*Traeme los interesados en el evento SELECT  COUNT(*) FROM interested WHERE id_publication = 6  */

                    }/*Cierro el if $cant_reg_consulta>0*/else{
                      echo "no traje nada";
                    }
                  }/*Cierro el if Consulta*/else{
                                    echo "fallo la consulta";
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

  <body class="screen_publication">


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
                      <a href=""><?php echo $_SESSION['user_name'];
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
                if (isset($_GET['code'])&& $_GET['code']=='errorInsert') {
                ?>
                   <script type="text/javascript">
                      window.alert("Se produjo un error al crear la publicación, por favor, intente de nuevo");
                      window.location.href= '../index.php#home';


                    </script>
                <?php
                }/*Cierra el if (isset($_GET['code'])&& $_GET['code']=='errorInsert'*/

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

      <!-- ================== MAIN-CONTENT =============-->

      <h2 class="back"> <a href="../index.php#home"> < Volver al Home </a> </h2>

      <div class="publication-content">
        <div class="publication">
          <div class="publication-img">
            <img src="../<?php echo $publicacion[11];  ?>" alt="imagen del evento">
          </div>

          <h2> <?php echo $publicacion[2];  ?></h2>
          <ul>
            <li> Interesados : [<?php echo $publicacion[9];  ?>]</li>
            <li> Asistentes  :[<?php echo $publicacion[10];  ?>]</li>
          </ul>

          <h3> Lugar: <?php echo $publicacion[5];?> </h3>
          <span> Invita: </span>
          <!-- Deberiamos redireccionar a la pagina del usuario -->
          <span><a href=""> <?php echo $publicacion[1];?> </a></span>

          <div class="info-publication">
            <h4> <?php echo $publicacion[6];?> </h3>
            <h4> <?php echo $publicacion[7];?> </h3>
              <div class="description">
                <h3> Descripcion </h3>

                <p>
                    <?php echo $publicacion[3];?>
                 </p>


              </div>

              <p style="color:white; position:relative; top:13vh; left:30vw; font-size:3em;"># <?php echo $publicacion[8]; ?></p>

          </div>

        </div>
      </div>

      <div class="publication-break">
      </div>


      <!-- ================== MY EVENTS ==================== -->



                         <!-- Sólo los usuarios loggueados podran acceder a Mis eventos -->
                           <?php if(isset($_SESSION['user_name']))  {

                          ?>

              <div class="myEvents">

                <div class="home-text">


                  <h2 class="home-text">Mis Eventos</h2>




                       <?php
                       $usuario =$_SESSION['user_name'];
                         $consulta_mis_eventos=" SELECT publicaciones.id_publication , publicaciones.user_name , publicaciones.title , publicaciones.description , publicaciones.text , publicaciones.address , publicaciones.date_initiation , publicaciones.date_end , publicaciones.gender, COUNT( DISTINCT(i.user_name)) AS interesados , COUNT(DISTINCT(a.user_name)) AS asistentes, publicaciones.image FROM publicaciones AS publicaciones
                                                LEFT OUTER JOIN assistants AS a USING(id_publication)
                                                LEFT OUTER JOIN interested AS i USING(id_publication)
                                               WHERE (i.user_name ='$usuario' OR a.user_name = '$usuario') AND  publicaciones.date_initiation> CURDATE()
                                                GROUP BY id_publication";

            /*Traeme*/
            $consulta = mysqli_query($conexion,$consulta_mis_eventos) or die (mysqli_error($conexion));

            $estado_mis_eventos = mysqli_num_rows($consulta);


                if ($estado_mis_eventos>0) {
                  ?>
                    </div><!-- Cierra Home-text -->
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
                        <p class="home-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit amet vitae enim. Aenean mattis felis non eros egestas, at aliquam ligula bibendum. Pellentesque viverra, felis nec lacinia rhoncus, nisi orci pulvinar ante, non accumsan turpis nisl sed sapien </p>

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

                <?php
                      }/*Cierra el  if(isset($_SESSION['user_name'])) */
                 ?>






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
