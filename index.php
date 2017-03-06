<?php
session_start();

      
      $conexion = mysqli_connect('localhost','root','augus32311213','agenda_online') or die ("Error en la conexion");
      $a=" SELECT publicaciones.id_publication , publicaciones.user_name , publicaciones.title , publicaciones.description , publicaciones.text , publicaciones.address , publicaciones.date_initiation , publicaciones.date_end , publicaciones.gender, COUNT( DISTINCT(i.user_name)) AS interesados , COUNT(DISTINCT(a.user_name)) AS asistentes FROM publicaciones AS publicaciones 
           LEFT OUTER JOIN assistants AS a USING(id_publication)
           LEFT OUTER JOIN interested AS i USING(id_publication)
           WHERE publicaciones.date_initiation> CURDATE()
           GROUP BY id_publication "; 

      /*Traeme*/
      $publicaciones = mysqli_query($conexion,$a) or die (mysqli_error($conexion));


      if($publicaciones){
        

            $cant_reg_consulta= mysqli_num_rows($publicaciones);

               if ($cant_reg_consulta>0) {
                    
                        $estado_publicacion = true;
      
                          /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes*/ 
                                    
                          /*   0                   1        2           3        4       5            6               7          8        9             10 */
                          /*Traeme los interesados en el evento SELECT  COUNT(*) FROM interested WHERE id_publication = 6  */

                    }/*Cierro el if $cant_reg_consulta>0*/else{
                      $estado_publicacion = false;
                    }
                  }/*Cierro el if Consulta*/else{
                                    echo "fallo la consulta";
                  }

?>

<!DOCTYPE html>

<html lang="es">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo/favicon.ico">
    <title> Ante Meridiem </title>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Six+Caps" rel="stylesheet">

  </head>

  <body>
        <!--=============== INTRO =================-->


    <div class="intro">
      <video autoplay muted loop id="videoby">

        <source src="img/backgrounds/audioSpectrum.mp4" type="video/mp4">
      </video>
        <h1 id="introA">Meridiem</h1>
        <h1 id="introB">Ante</h1>
        <p id="introC">Agenda Nocturna</p>

    </div>

     <!--=============== MAIN CONTENT =================-->

    <div class="main-content" >



      <!--=============== HEADER =================-->

      <div class="header" id="home">
        <div class="header-logo">

          <img src="img/logo/logoblack.jpg" alt="Logo">

        </div>
        <div class="header-center">

          <h2>Ante Meridiem</h2>
          <p> La agenda nocturna de Chivilcoy</p>

        </div>
        <div class="header-login">

          <img src="img/images/icon-user.png" alt="User">
          <form method="POST" action="php/login.php" >

              <?php

              if (isset($_GET["estado"])) {

                  if($_GET["estado"]== "error"){ ?>
                    <script type="text/javascript">
                      window.alert("Los datos ingresados son incorrectos");
                      window.location.href= 'http://localhost/WebMaster/index.php#home';


                    </script>
                  <?php

                  unset($_GET["estado"]);

                }else{ if($_GET["estado"]== "bloqueado"){?>

                    <script type="text/javascript">
                      window.alert("Usuario Bloqueado");
                      window.location.href= 'http://localhost/WebMaster/index.php#home';
                    </script>




              <?php

                }
              }

              } else{

              if(isset($_SESSION['user_name']))  {

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

              } else {


                  ?>




            <label class="user">
              <input type="text" placeholder="User or Email" name="user_name" required>
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

              <?php
              } /*cierra el else isset($_SESSION['user_name']) */
            }/*Cierra el else isset($_GET["estado"])*/
            ?>

          </form>



        </div> <!-- Cierra LOGIN-->

        </div> <!-- Cierra HEADER -->

    <!-- ================ BUSCADOR ======================-->
        <div class="buscador">
          <form action="" method="">
            <input class="busqueda" type="" placeholder="Ingrese aqui su busqueda" required>
            <input type="submit" value="Buscar">
          </form>
        </div>


        <!-- ================= FORMULARIO REGISTRO ==================== -->
    <!--


      <!-- ================ CONTENIDO ============== -->

      <div class="contenido">
        <div class="home-text">
          <h2 class="home-text">Lorem ipsum dolor sit amet</h2>
          <p class="home-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit amet vitae enim. Aenean mattis felis non eros egestas, at aliquam ligula bibendum. Pellentesque viverra, felis nec lacinia rhoncus, nisi orci pulvinar ante, non accumsan turpis nisl sed sapien </p>
        </div>
        <div class="next-events">
          <h2> Proximos Eventos</h2>
          <div class="cartelera">
            <ul>
              <li><a href="http://localhost/WebMaster/php/screen_publication.php"> Jack - Piluso 27.08.17 </a></li>
              <li><a href="http://localhost/WebMaster/php/screen_publication.php"> Oesterheld - La Ronda 27.08.17 </a></li>
              <li><a href="http://localhost/WebMaster/php/screen_publication.php"> La Parna - Bartolo 27.08.17 </a></li>
              <li><a href="http://localhost/WebMaster/php/screen_publication.php"> Jack - Los indios 27.08.17 </a></li>
              <li><a href="http://localhost/WebMaster/php/screen_publication.php"> La Parna - Bartolo 27.08.17 </a></li>

            </ul>
          </div>
        </div>

        <div class="events">


          <div class="publicaciones-content">
          <?php
          if ($estado_publicacion) {
            
          while ($publicacion =mysqli_fetch_row($publicaciones)) {
                     /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes*/ 
                                    
                          /*   0                   1        2           3        4       5            6               7          8        9             10 */
            ?>
            <div class="p-contenedor">
              <div class="publicaciones">

                <h2><?php echo $publicacion[2];  ?></h2>

                <img class="portada" src="img/images/jack.jpeg">

                <br>
                <a href="http://localhost/WebMaster/php/screen_publication.php?id_publication=<?php echo $publicacion[0];  ?>"> mas informacion</a>



                <div class="publicaciones-b"   >
                  <p> Interesados: [<?php echo $publicacion[9];  ?>] Asistentes: [<?php echo $publicacion[10];  ?>] </p>
                  <p> <?php echo $publicacion[4];  ?> </p>
                  <p> <?php echo $publicacion[5];  ?><br>
                      <?php echo $publicacion[8];  ?> </p>
                 <a href="http://localhost/WebMaster/php/screen_publication.php?id_publication=<?php echo $publicacion[0];  ?>"> mas informacion</a>
                </div>

              </div>
            </div>
            <?php  
              }/*cierra el while ($publicacion =mysqli_fetch_row($publicaciones))*/
             }/*Cierra el  if ($estado_publicacion)*/ else{
              
              ?>
              <p>  No hay publicaciones para mostrar </p>
              <?php  
             }
             ?>
         
           </div>

<!--

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/images/a.jpeg">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones-b">
                <p> Interesados: [] Asistentes: [] </p>
                <p> Info info info info info info info info info info info </p>
                <p> Aca iria el lugar, el genero y algo mas si quieren agregar </p>
            </div>


            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada"  src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>
-->
          </div>

          <div class="filtros-publicaciones">
              <h3>Filtrar por:</h3>
              <form action="" method="">
                <label>
                  <select name="genero">
                    <option value="rock">Rock</option>
                    <option value="funk">Funk</option>
                    <option value="soul">Soul</option>
                    <option value="reggae">Reggae</option>
                    <input type="submit" value="submit">
                  </select>
                </label>

                <label>
                  <select name="fecha">
                    <option value="esteSemana">Este Semana</option>
                    <option value="esteMes">Este Mes</option>
                    <input type="submit" value="submit">
                  </select>
                </label>

                <label>
                  <select name="lugar">
                    <option value="bartolo">Bartolo</option>
                    <option value="piluso">Piluso</option>
                    <option value="losIndios">Los Indios</option>
                    <option value="shotBar">ShotBar</option>
                    <input type="submit" value="submit">
                  </select>
                </label>
          </div>

        </div> <!-- CIERRA EVENTS -->

          <!-- CREAR EVENTO -->
            
                 <?php if(isset($_SESSION['user_name']))  {

                  ?>
                  <a href="http://localhost/WebMaster/php/screen_add_event.php"> Crear Evento </a>


                  <?php
                      }/*Cierra el  if(isset($_SESSION['user_name'])) */

                  ?>




          <!-- CIERRA CREAR EVENTO -->

        <div class="break">
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
                   $consulta_mis_eventos=" SELECT publicaciones.id_publication , publicaciones.user_name , publicaciones.title , publicaciones.description , publicaciones.text , publicaciones.address , publicaciones.date_initiation , publicaciones.date_end , publicaciones.gender, COUNT( DISTINCT(i.user_name)) AS interesados , COUNT(DISTINCT(a.user_name)) AS asistentes FROM publicaciones AS publicaciones 
                                          LEFT OUTER JOIN assistants AS a USING(id_publication)
                                          LEFT OUTER JOIN interested AS i USING(id_publication)
                                         WHERE (i.user_name ='$usuario' OR a.user_name = '$usuario') AND  publicaciones.date_initiation> CURDATE()
                                          GROUP BY id_publication"; 

      /*Traeme*/
      $consulta = mysqli_query($conexion,$consulta_mis_eventos) or die (mysqli_error($conexion));

      $estado_mis_eventos = mysqli_num_rows($consulta);


          if ($estado_mis_eventos>0) {
            
          while ($publicacion =mysqli_fetch_row($consulta)) {
                     /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes*/ 
                                    
                          /*   0                   1        2           3        4       5            6               7          8        9             10 */
            ?>

            </div><!-- Cierra Home-text -->

              <div id="slideshow-container">
                <div id="slideshow">
                  <div id="box1">
                    <div class="MyEventsImg">
                        <img src="img/images/jack.jpeg">
                        <p> <?php echo $publicacion[6];  ?> </p>
                    </div>

                    <div class="infoEvent">
                      <h2> <?php echo $publicacion[2];  ?> </h2>
                      <p> <?php echo $publicacion[4];  ?>.</p>
                      <span><a href="http://localhost/WebMaster/php/screen_publication.php?id_publication=<?php echo $publicacion[0];  ?>"> Mas info </a></span>

                    </div>

                  </div>

               </div>  <!--CIERRA SLIDESHOW -->
              </div> <!-- CIERRA SLIDESHOW-CONTAINER -->
                 

         
                 <?php  
              }/*cierra el while ($publicacion =mysqli_fetch_row($publicaciones))*/
             }/*Cierra el  if ($estado_publicacion)*/ else{
              
              ?>
                  <p class="home-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit amet vitae enim. Aenean mattis felis non eros egestas, at aliquam ligula bibendum. Pellentesque viverra, felis nec lacinia rhoncus, nisi orci pulvinar ante, non accumsan turpis nisl sed sapien </p>
       
              </div><!-- Cierra Home-text -->

          <div id="slideshow-container">
                <div id="slideshow">
                  <div id="box1">
                    <div class="MyEventsImg">
                        <img src="img/images/jack.jpeg">
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


      </div> <!-- CIERRA CONTENIDO-->



      </div> <!-- Cierra MAIN CONTET-->

      <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
      <script src="js/animation.js"></script>
  </body>

</html>
