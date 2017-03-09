<?php
session_start();

include("connections.php");


 if (!isset($_GET['user'])|| !isset($_SESSION['user_name'])) {

      header("Location: ../index.php?ocultar=true#home");

  }/*Cierro el if!isset*/
  else{
    $user_password = $_GET['user'];

    $b ="SELECT usuarios_filtrados.user_name  FROM usuarios_filtrados 
         WHERE usuarios_filtrados.user_name = '$user_password'";

    $consulta_b = mysqli_query($conexion,$b) or die (mysqli_error($conexion));

    $user_password_date = mysqli_fetch_row($consulta_b);
  }

      

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

              }?>

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

      <h2 class="back"> <a href="../index.php?ocultar=true#home"> < Volver al Home </a> </h2>


      <div class="formulario" id="formularioRegistro">

              <?php

                     if((isset($_SESSION['user_name']) && 
                    ($_SESSION['user_name'] ==$user_password_date[0] )) || (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 ))) {

                  if (isset($_GET["password_estado"])) {

                      switch ($_GET["password_estado"]) {
                        case 'nocoinciden':
                                  ?>
                          <script type="text/javascript">
                              window.alert("Las nuevas contraseñas no coinciden");
                              window.location.href= 'screen_user_password.php?user=$user_password';
                          </script>

                                  <?php
                    
                        break;
                        
                        case 'oldpassword':
                                  ?>
                          <script type="text/javascript">
                              window.alert("Su contraseña es incorrecta");
                              window.location.href= 'screen_user_password.php?user=$user_password';
                          </script>

                                  <?php
                    
                        break;
                        

                        case 'ok': //redireccionar a la pantalla para ingresar codigo de validación
                               
                                    # code...
                                   ?>
                                   <script type="text/javascript">
                                    window.alert("Se ha modificado la contraseña,por favor, vuelva a ingresar");
                                     window.location.href= 'unlogin.php';
                                  </script>

                                 <?php
                                 
                       
                         break;

                            default:
                              ?>
                                   <script type="text/javascript">
                                    window.alert("FATAL ERROR");
                                    window.location.href= '../index.php?ocultar=true#home';

                                  </script>

                                 <?php
                             
                              break;
                              } /*Cierra el if (!isset($_GET['codigo_validacion'])*/

                                                 
                      
                  }//cierre del if isset formulario estado
                else{
                  ?>

                             

                    
                        

                         

                        <form method="POST" action="user_password.php?user=<?php echo  $user_password;?>">
                        <label class="validation_code">
                          <span>Contraseña actual</span>
                          <input type="password" placeholder="" name="old_password" required>

                         <span>Nueva contraseña</span>
                         <input type="password" placeholder="" name="new_password" required>

                        <span>Nueva contraseña</span>
                        <input type="password" placeholder="" name="new_password1" required>
                        </label>
                        <div class="buttons">
                
                          <button type="submit" id="confirmar">Confirmar </button>
              
                        </div>
                    
               
      
            <?php
                }/*Cierro el else isset($_GET["formulario_estado"]*/
               }/*Cierro choclo*/ else{
                     header("Location: ../index.php?ocultar=true#home");
                                    echo "fallo la consulta";
                                  }
              ?>


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
