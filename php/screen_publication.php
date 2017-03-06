<?php
session_start();
 if (!isset($_GET['id_publication'])) {
    
      header("Location: http://localhost/WebMaster/index.php#home");

  }/*Cierro el if!isset*/
  else{ 
      $id_publication = $_GET['id_publication'];
      
      $conexion = mysqli_connect('localhost','root','augus32311213','agenda_online') or die ("Error en la conexion");
      $a=" SELECT publicaciones.id_publication , publicaciones.user_name , publicaciones.title , publicaciones.description , publicaciones.text , publicaciones.address , publicaciones.date_initiation , publicaciones.date_end , publicaciones.gender, COUNT( DISTINCT(i.user_name)) AS interesados , COUNT(DISTINCT(a.user_name)) AS asistentes FROM publicaciones AS publicaciones 
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
      
                          /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes*/ 
                                    
                          /*   0                   1        2           3        4       5            6               7          8        9             10 */
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
                     window.location.href= 'http://localhost/WebMaster/php/unlogin.php';
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
                      window.location.href= 'http://localhost/WebMaster/index.php#home';


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

            <a href="http://localhost/WebMaster/php/screen_register.php">  Registrarse </a>

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

      <h2 class="back"> <a href="http://localhost/WebMaster/index.php#home"> < Volver al Home </a> </h2>

      <div class="publication-content">
        <div class="publication">
          <div class="publication-img">
            <img src="../img/images/jack.jpeg" alt="imagen del evento">
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


          </div>
        </div>
      </div>

      <div class="publication-break">
      </div>
      <!-- ================== MY EVENTS ==================== -->


      <div class="myEvents">

        <div class="home-text">
          <h2 class="home-text">Lorem ipsum dolor sit amet</h2>
          <p class="home-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit amet vitae enim. Aenean mattis felis non eros egestas, at aliquam ligula bibendum. Pellentesque viverra, felis nec lacinia rhoncus, nisi orci pulvinar ante, non accumsan turpis nisl sed sapien </p>
        </div>


            <div id="slideshow-container">
              <div id="slideshow">
                <div id="box1">
                  <div class="MyEventsImg">
                      <img src="../img/images/jack.jpeg">
                      <p> 27.08.2017 </p>
                  </div>

                  <div class="infoEvent">
                    <h2> Jack - Piluso </h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                    <span><a href=""> Mas info </a></span>

                  </div>

                </div>
                <div id="box2">
                  <div class="MyEventsImg">
                      <img src="../img/images/a.jpeg">
                      <p> 02.09.2017 </p>
                  </div>

                  <div class="infoEvent">
                    <h2> AC/DC - River Plate </h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                    <span><a href=""> Mas info </a></span>

                  </div>
                </div>
                <div id="box3">
                  <div class="MyEventsImg">
                      <img src="../img/images/jack.jpeg">
                      <p> 27.08.2017 </p>
                  </div>

                  <div class="infoEvent">
                    <h2> Jack - Piluso </h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                    <span><a href=""> Mas info </a></span>

                  </div>
                </div>
                <div id="box4">
                  <div class="MyEventsImg">
                      <img src="../img/images/jack.jpeg">
                      <p> 27.08.2017 </p>
                  </div>

                  <div class="infoEvent">
                    <h2> Jack - Piluso </h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                    <span><a href=""> Mas info </a></span>

                  </div>
                </div>
              </div>  <!--CIERRA SLIDESHOW -->



            </div> <!-- CIERRA SLIDESHOW-CONTAINER -->

      </div>




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
