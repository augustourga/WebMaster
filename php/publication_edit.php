<?php
session_start(); 
include("connections.php");


 if (!isset($_GET['id_publication'])||!isset($_SESSION['user_name'])) {

      header("Location: ../index.php#home");

  }/*Cierro el if!isset*/
  else{
      $id_publication = $_GET['id_publication'];
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
                         if((isset($_SESSION['user_name']) && 
                    ($_SESSION['user_name'] ==$publicacion[1] )) || (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 1 ))) {
                         	
                         }
                         	else{
                         		 header("Location: ../index.php#home");

                         	}

                          /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes img*/

                          /*   0                   1        2           3        4       5            6               7          8        9             10 *     11/
                          /*Traeme los interesados en el evento SELECT  COUNT(*) FROM interested WHERE id_publication = 6  */

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
   <link rel="stylesheet" type="text/css" href="../js/datetimepicker/jquery.datetimepicker.css">
   <script src="../js/datetimepicker/jquery.js"></script>
   <script src="../js/datetimepicker/build/jquery.datetimepicker.full.js"></script>
	<style>
	</style>

  </head>

  <body class="screen_addEvent">

      <script >
        $(document).ready(function(){
     
        $("#campofecha").datetimepicker({ minDate: 0 });
         $("#campofecha2").datetimepicker({ minDate: 0 });
        })
      </script>


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
                if (isset($_GET['code'])&& $_GET['code']=='errorInsert') {
                ?> 
                   <script type="text/javascript">
                      window.alert("Se produjo un error al crear la publicación, por favor, intente de nuevo");
                      window.location.href= '../index.php#home';


                    </script>
                <?php
                }/*Cierra el if (isset($_GET['code'])&& $_GET['code']=='errorInsert'*/

              } else {
              			header("Location: ../index.php#home");
              		}

                  ?>




        </div> <!-- Cierra LOGIN-->

        </div> <!-- Cierra HEADER -->

    <!-- ================ BUSCADOR ======================-->

        <div class="buscador">

   <!--          <form action="" method="">
                <input class="busqueda" type="" placeholder="Ingrese aqui su busqueda" required>
                <input type="submit" value="Buscar">
              </form>
    -->     </div>

      <!-- ================== MAIN-CONTENT =============-->

      <h2 class="back"> <a href="../index.php#home"> < Volver al Home </a> </h2>

		<!-- <div class="home-text">
          <h2 class="home-text">Lorem ipsum dolor sit amet</h2>
          <p class="home-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit amet vitae enim. Aenean mattis felis non eros egestas, at aliquam ligula bibendum. Pellentesque viverra, felis nec lacinia rhoncus, nisi orci pulvinar ante, non accumsan turpis nisl sed sapien </p>
        </div> -->

		<div class="addEvent-mainContent">

			<div class="addEvent">

				<h2> Editar Evento </h2>

				<div class="addEvent-left">
					<form action="edit_event.php?id_publication=<?php echo $publicacion[0];  ?>" method="POST" id="crearEvento" enctype="multipart/form-data">
			<!-- 		/* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes img*/

                          /*   0      1        2           3        4       5            6               7          8        9             10 *     11/
                          /*Traeme los interesados en el evento SELECT  COUNT(*) FROM interested WHERE id_publication = 6  */

 -->
						<label>
							Nombre del Evento:

							<br>
							<input type="text" name="title" maxlength="40"   required value="<?php echo $publicacion[2];  ?>"> 
						</label>
						<br>
						<label>
							Direccion:
							<br>
							<input type="text" name="address" maxlength="30"  required value="<?php echo $publicacion[5];  ?>" >
						</label>
						<br>
						<label>
						Inicia:
							<br>
							<input class="date" type="datetime" name="date_initiation" id= "campofecha"  required value="<?php echo $publicacion[6];  ?>">
						</label>
						<br>
						<label>
							Finaliza:
							<br>
							<input class="date" type="datetime" name ="date_end" id= "campofecha2" required value="<?php echo $publicacion[7];  ?>" >
						</label>
						<br>
						<label>
							Genero:

							<select name="gender" >
								<option value="rock">Rock</option>
								<option value="funk">Funk</option>
								<option value="soul">Soul</option>
								<option value="reggae">Reggae</option>
                				<option value="Otro">Otro</option>
							</select>


						</label>
						<br>
						<label class="upImage"  >
							Imagen:

							<input type="file" name="image" >
						</label>
           
             
					<label>

          	<input id="enviarEvento" type="submit" value="Editar Evento">
          </label> 
					</form>
				</div>
				<div class="addEvent-right">



						<label>
							Informacion:
							<br>
							<textarea form="crearEvento" rows="3" cols="50"  maxlength="60" value name= "text" ><?php echo $publicacion[3];  ?></textarea>
						</label>
						<br>
						<label>
							Descripcion:
							<br>
							<textarea form="crearEvento" rows="6" cols="50"  placeholder="Información más amplia acerca del evento..." name="description"  required><?php echo $publicacion[4];  ?></textarea>
						</label>

					<br>


				</div> 
				
			</div>

		</div>

			<div class="black">
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
