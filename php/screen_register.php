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
        <div class="header-center">

          <h2>Ante Meridiem</h2>
          <p> La agenda nocturna de Chivilcoy</p>

        </div>
        <div class="header-login">

        <!--  <img src="../img/images/icon-user.png" alt="User">
          <form method="POST" action="php/login.php" >
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

              <a href="http://localhost:8888/Sitio%202.0/registro.php">  Registrarse </a>

          </form>


-->
        </div> <!-- Cierra LOGIN-->

        </div> <!-- Cierra HEADER -->

    <!-- ================ BUSCADOR ======================-->


      <!-- ================== REGISTRO =============-->

      <h2 class="back"> <a href="http://localhost/WebMaster/index.php#home"> < Volver al Home </a> </h2>


      <div class="formulario" id="formularioRegistro">

              <?php
                  if (isset($_GET["formulario_estado"])) {

                      switch ($_GET["formulario_estado"]) {
                        case 'usererror':
                                  ?>
                          <script type="text/javascript">
                              window.alert("Ya existe un usuario con ese nombre");
                              window.location.href= 'http://localhost/WebMaster/php/screen_register.php';
                          </script>

                                  <?php
                    
                        break;
                        case 'ok': //redireccionar a la pantalla para ingresar codigo de validación
                                if (!isset($_GET['codigo_validacion'])) {
                                    # code...
                                   ?>
                                   <script type="text/javascript">
                                    window.alert("Se ha enviado un e-mail con el codigo de validacion al siguiente correo: <?php echo $_GET['mail']; ?>");
                                  </script>

                                 <?php
                                 } /*Cierra el if (!isset($_GET['codigo_validacion'])*/

                        $id = $_GET["id"];
                        if(isset($_GET["codigo_validacion"])){
                          switch ($_GET["codigo_validacion"]) {
                            case 'false':
                                     ?>
                                   <script type="text/javascript">
                                    window.alert("Codigo de validación incorrecto");
                      

                                  </script> 
                                     <?php 
                              break;

                             case 'true':
                                 ?>
                                   <script type="text/javascript">
                                    window.alert("Usuario creado exitosamente");
                                    window.location.href= 'http://localhost/WebMaster/index.php#home';
                                  </script>

                                 <?php
                             break;

                            default:
                              ?>
                                   <script type="text/javascript">
                                    window.alert("FATAL ERROR");
                                    window.location.href= 'http://localhost/WebMaster/index.php';
                                  </script>

                                 <?php
                             
                              break;
                          }
                             

                    
                        

                      }/*Cierro el if de isset($_GET["codigo_validacion" */
                          ?>

                        <form method="POST" action="validation_code.php?id=<?php echo $id ?>">
                        <label class="validation_code">
                          <span>Código de Activación</span>
                          <input type="text" placeholder="" name="validation_code" required>
                        </label>
                        <div class="buttons">
                
                          <button type="submit" id="confirmar">Confirmar </button>
              
                        </div>
                    <?php
                        break;
                        case 'mensajeerror':
                        ?>
                          <script type="text/javascript">
                              window.alert("Ocurrio un problema al enviar el código de validación, por favor revise su dirección de email");
                              window.location.href= 'http://localhost/WebMaster/php/screen_register.php';
                          </script>

                    <?php
                            break;
                        default:
                            ?>
                              <script type="text/javascript">
                              window.alert("fatal error");
                              window.location.href= 'http://localhost/WebMaster/php/screen_register.php';
                          </script>
                            <?php

                        break;
                      }
                      
                  }//cierre del if isset formulario estado
                else{
                  ?>

        <h2> Registrarse </h2>
        <form method="POST" action="http://localhost/WebMaster/php/register.php">
          <label class="user-name">
            <span> Nombre Usuario</span>
            <br>
            <input type="text" placeholder="" name="user_name" required>
          </label>

          <br>

          <label class="nombre">
              <span>Nombre </span>
              <br>
              <input type="text" placeholder="" name="name" required>
          </label>

          <br>

          <label class="Apellido">
              <span> Apellido </span>
              <br>
              <input type="text" placeholder="" name="last_name" required>
          </label>

          <br>

          <label class="mail">
              <span> E-mail </span>
              <br>
              <input type="mail" placeholder="" name="mail" required>
          </label>

          <br>

         <!--  <label class="fechaNacimiento">
              <span> Fecha Nacimiento </span>
              <br>
              <input type="" placeholder="" name="" required>
          </label> -->

          <br>

          <label class="password">
              <span> Password </span>
              <br>
              <input type="password" placeholder="" name="password" required>
          </label>

          <br>
          <div class="registro-buttons">
            <button type="" id="" onclick="">Cancelar</button>
            <button type="" id="">Confirmar</button>
          </div>
        </form>
            <?php
                }/*Cierro el else isset($_GET["formulario_estado"]*/
              ?>


      </div> <!-- Cierra REGISTRO -->


    </div> <!-- CIERRA CONTENIDO ======-->




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
