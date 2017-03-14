<?php
session_start();

include("connections.php");
include("functions.php");


 if (!isset($_GET['id_publication'])) {

      header("Location: ../index.php#home");

  }/*Cierro el if!isset*/
  else{
      $id_publication = $_GET['id_publication'];

      $a=" SELECT publicaciones.id_publication , publicaciones.user_name , publicaciones.title , publicaciones.description , publicaciones.text , publicaciones.address , publicaciones.date_initiation , publicaciones.date_end , publicaciones.gender,  COUNT( DISTINCT(i.user_name)) AS interesados , COUNT(DISTINCT(a.user_name)) AS asistentes , publicaciones.image FROM publicaciones AS publicaciones
           LEFT OUTER JOIN assistants AS a USING(id_publication)
           LEFT OUTER JOIN interested AS i USING(id_publication)
           WHERE publicaciones.id_publication = '$id_publication'
          GROUP BY user_name ";
      $consulta_comentarios = "SELECT comments.user_name , comments.date_comments ,comments.comment , usuarios_filtrados.image_profile, comments.id_publication , comments.id_comments FROM comments JOIN usuarios_filtrados USING(user_name) WHERE comments.id_publication = '$id_publication' ";
      /*ORDER BY comments.date_comments DESC"*/

      /*Traeme*/
      $consulta = mysqli_query($conexion,$a) or die (mysqli_error($conexion));


      if($consulta){


            $cant_reg_consulta= mysqli_num_rows($consulta);

               if ($cant_reg_consulta>0) {

                        $publicacion = mysqli_fetch_row($consulta);

                          /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes img*/

                          /*   0                   1        2           3        4       5            6               7          8        9             10 *     11*/


                           $comentarios = mysqli_query($conexion,$consulta_comentarios) or die (mysqli_error($conexion));
                          /*Traeme los interesados en el evento SELECT  COUNT(*) FROM interested WHERE id_publication = 6  */
                          if (isset($_SESSION['user_name'])) {
                              $es_interesado= are_u_interested($_SESSION['user_name'], $id_publication);
                              $es_asistente= are_u_assistant($_SESSION['user_name'], $id_publication);
                          }
                      

                    }/*Cierro el if $cant_reg_consulta>0*/else{
                      echo "no traje nada";
                      header("Location: ../index.php#home");

                    }
                  }/*Cierro el if Consulta*/else{
                                    echo "fallo la consulta";
                                    header("Location: ../index.php#home");
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

      <!-- =============ADMINISTRAR PUBLICACION======== -->


       <?php  
           /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes img*/

          /*   0                   1        2           3        4       5            6               7          8        9             10 *     11/
                          /*Traeme los interesados en el evento SELECT  COUNT(*) FROM interested WHERE id_publication = 6  */

         if((isset($_SESSION['user_name']) &&
                    ($_SESSION['user_name'] ==$publicacion[1] )) || (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 ))) {

              ?>
      <div class="panel_admin_publication">

          <a href="publication_delete.php?id_publication= <?php echo $publicacion[0]; ?>">Borrar </a>
          <a href="publication_edit.php?id_publication= <?php echo $publicacion[0]; ?>">Editar </a>

      </div>
        <?php }  ?>

      <!-- ============= FIN ADMINISTRAR PUBLICACION=== -->

      <h2 class="back"> <a href="../index.php?ocultar=true#home"> < Volver al Home </a> </h2>

      <div class="publication-content">
        <div class="publication">
          <div class="publication-img">
            <img src="../<?php echo $publicacion[11];  ?>" alt="imagen del evento">
          </div>

          <div class="publication-title">
            <h2> <?php echo $publicacion[2];  ?> </h2>
          </div>

          <div class="publication-interactions">
            <ul>
            <?php 
            if(isset($_SESSION['user_name'])){
               ?>
            <?php if($es_asistente){ ?>
              <li ><a href="interaction.php?id_publication=<?php echo $publicacion[0];?>&action=imngoing">Asistentes: [<?php echo $publicacion[10];  ?>]</a> </li>
              <?php } else { ?>
              <li ><a href="interaction.php?id_publication=<?php echo $publicacion[0];?>&action=imgoing">Asistentes: [<?php echo $publicacion[10];  ?>]</a> </li>
              <?php }  ?>

              <?php if($es_interesado){ ?>
              <li ><a href="interaction.php?id_publication=<?php echo $publicacion[0];?>&action=imninsterested">Interesados: [<?php echo $publicacion[9]; ?>]</a></li>
              <?php } else { ?>
              <li ><a href="interaction.php?id_publication=<?php echo $publicacion[0];?>&action=iminsterested">Interesados: [<?php echo $publicacion[9]; ?>]</a></li>
              <?php }  ?>
              <li></li>

              <?php } else{ ?>

                  <li> Asistentes: [<?php echo $publicacion[10];  ?>]</li>
                 <li> Interesados: [<?php echo $publicacion[9];  ?>]</li>

              <?php }?>
            </ul>
          </div>

          <div class="publication-info">
            <h3>Invitacion:</h3>
            <p> <a href="screen_user.php?user=<?php echo $publicacion[1];
                         ?>"> <?php echo $publicacion[1];?> </a></p>
            <h3> Fecha: </h3>
            <p> Desde <?php echo $publicacion[6];?> <br> hasta <?php echo $publicacion[7];?> </p>
            <h3> Lugar: </h3>
            <p> <?php echo $publicacion[5];?> </p>

          </div>

          <div class="publication-description">
            <h3>Descripcion: </h3>
            <p>
              <?php echo $publicacion[3];?>
            </p>
          </div>

          <div class="publication-gender">
            <h2> # <?php echo $publicacion[8]; ?> </h2>
          </div>

        </div>
      </div>

      <div class="publication-break">
      </div>


      <!-- ================== COMMENTS ==================== -->


<!--comments.user_name , comments.date_comments ,comments.comment , usuarios_filtrados.image_profile, comments.id_publication , comments.id_comments-->
<!--  0                         1                         2                      3                               4                        5            -->

<div class="myEvents" id = "comments">
  <div class="comments-container">
   
    <h2>Comentarios </h2>
  
<style type="text/css">
    .comments-list{
      background-color: black;
       border-radius: 3%;

    }
    .comments-container{
      background-color: black;
      position: relative; 
      padding-left: 100px;
      padding-right: 100px;

     
    }
    .comment-box{
      position: relative;
      padding-right: 50px;
      padding-left: 50px;
      background-color: grey;

    }
</style>
    <ul id="comments-list" class="comments-list">
    <?php if ($comentarios) {
               $cant_comentarios = mysqli_num_rows($comentarios);
                   if ($cant_comentarios>0) {
                         while ( $comentario = mysqli_fetch_row($comentarios)) {
                      /*         echo $comentario[0];
                          echo $comentario[1];
                          echo $comentario[2];
                          echo $comentario[3];
                            echo $comentario[4]; 

                       */


          ?>                

      <li>
        <!-- <div class="comment-main-level"> -->
          <!-- Avatar -->
<!--           ruta img src  ../img/user_img/<?php /*echo $comentarios[3];*/  ?>
 --><!--           <div class="comment-avatar"><img src="" alt=""></div>
 -->          <!-- Contenedor del Comentario -->
          <div class="comment-box" >
            <div class="comment-head">
            <!-- autor del comentario -->
              <h6 class="comment-name by-author"><a href="screen_user.php?user=<?php echo $comentario[0];  ?>">
           
              <?php echo $comentario[0];  ?></a><br></h6>
                   <!-- Fecha del comentario estaria bueno cambiar a hace "tanto tiempo"  -->
              <span><?php echo $comentario[1];  ?><br></span>
             
            </div>
            <div class="comment-content">

            <!-- commentario -->
             <?php echo $comentario[2];  ?>
             <!-- panel de commentario -->
             <?php if ((isset($_SESSION['user_name'] ) && $_SESSION['user_name']== $comentario[0] ) || (isset($_SESSION['user_type'] ) && $_SESSION['user_type'] == 1 ) ) {
              ?>
                <a href="delete_comment.php?id_comments=<?php echo $comentario[5]; ?>&id_publication=<?php echo $comentario[4]; ?>">borrar</a>
             <?php
             }  ?>
            </div> <br>
          </div>
        <!-- </div> -->
      </li>

           <?php              
                              }/*Cierra el While*/   
      }/*Cierra el if ($CANT*/
      else{
        ?>
              <li>
        <!-- <div class="comment-main-level"> -->
          <!-- Avatar -->
<!--           ruta img src  ../img/user_img/<?php /*echo $comentarios[3];*/  ?>
 --><!--           <div class="comment-avatar"><img src="" alt=""></div>
 -->          <!-- Contenedor del Comentario -->
          <div class="comment-box">
            <div class="comment-head">
              <h6 class="comment-name by-author"><br></h6>
              <span>  <br></span>
             
            </div>
            <div class="comment-content">
             No hay comentarios para mostrar
            </div> <br>
          </div>
        <!-- </div> -->
      </li>
        <?php 
      }
    }/*Cierra el if($comentarios)*/ ?>

      
      <?php if (isset($_SESSION['user_name'])&& isset($_GET['id_publication'])) {
           $id_publication = $_GET['id_publication'];
       
       ?>
      <li>
        <div id = "new-comment">
        <h2>Nuevo Comentario </h2>
            <form action="add_comment.php?id_publication=<?php echo    $id_publication; ?>" method="POST" >
              <textarea placeholder="Inserte un commentario" name="comment_text" required></textarea>
              <input type="submit" name="Comentar">
              
            </form>
        </div>
      </li>
      <?php }  ?>
       
    </ul>
  </div>
  </div>


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
