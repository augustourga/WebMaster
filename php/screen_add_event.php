<?php
session_start(); 
 ?>

<!DOCTYPE html>

<html lang="es">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/logo/favicon.ico">
    <title> Ante Meridiem </title>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Six+Caps" rel="stylesheet">

	<style>
	</style>

  </head>

  <body class="screen_addEvent">


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

              } else {
              			header("Location: http://localhost/WebMaster/index.php#home");
              		}

                  ?>


  <!--         <img src="../img/images/icon-user.png" alt="User">
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

        <div class="buscador">

   <!--          <form action="" method="">
                <input class="busqueda" type="" placeholder="Ingrese aqui su busqueda" required>
                <input type="submit" value="Buscar">
              </form>
    -->     </div>

      <!-- ================== MAIN-CONTENT =============-->

      <h2 class="back"> <a href="http://localhost/WebMaster/index.php#home"> < Volver al Home </a> </h2>

		<!-- <div class="home-text">
          <h2 class="home-text">Lorem ipsum dolor sit amet</h2>
          <p class="home-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit amet vitae enim. Aenean mattis felis non eros egestas, at aliquam ligula bibendum. Pellentesque viverra, felis nec lacinia rhoncus, nisi orci pulvinar ante, non accumsan turpis nisl sed sapien </p>
        </div> -->

		<div class="addEvent-mainContent">

			<div class="addEvent">

				<h2> Crear Evento </h2>

				<div class="addEvent-left">
					<form action="add_event.php" method="POST" id="crearEvento">

						<label>
							Nombre del Evento:
							<br>
							<input type="text" name="title"  required>
						</label>
						<br>
						<label>
							Direccion:
							<br>
							<input type="text" name="address" required >
						</label>
						<br>
						<label>
						Inicia:
							<br>
							<input class="date" type="datetime-local" name="date_initiation" required>
						</label>
						<br>
						<label>
							Finaliza:
							<br>
							<input class="date" type="datetime-local" name ="date_end" required>
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
						<label class="upImage" >
							Imagen:

							<input type="file" name="image">
						</label>
           
             
					<label>

          	<input id="enviarEvento" type="submit" value="Crear Evento">
          </label> 
					</form>
				</div>
				<div class="addEvent-right">



						<label>
							Informacion:
							<br>
							<textarea form="crearEvento" rows="3" cols="50" placeholder="Describe yourself here..." name= "text"></textarea>
						</label>
						<br>
						<label>
							Descripcion:
							<br>
							<textarea form="crearEvento" rows="6" cols="50" placeholder="Describe yourself here..." name="description" required></textarea>
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
