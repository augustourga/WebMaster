<?php 
/*
if(!isset($_SESSION['user_name'])){
session_start();
}*/
session_start();
/*require_once('php/connections.php');*/
//ademas debe conectarse a la bd y dejarme una conexion abierta. Cuando se cierra, tengo que borrar los
// datos de sesion y ademas la conexion a la bd;
 ?>
<!DOCTYPE html>

<html lang="es">

	<head>
		<meta charset="utf-8">
		<title> Portal Chivilcity</title>
		<link rel="stylesheet" href="css/grid.css">
		<link rel="stylesheet" href="css/index.css">
		<link href="https://fonts.googleapis.com/css?family=Syncopate|Barrio|Bangers|Six+Caps|Lekton|Shadows+Into+Light|Indie+Flower|Amatic+SC|PT+Mono" rel="stylesheet">
	</head>
		


	<body>



										<!--- Intro al Sitio -------->

		<section class="intro">
			<video autoplay  poster="" id="videoby" muted loop >

				<source src="css/background/audioSpectrum.mp4" type="video/mp4">

			</video>


				<div class="row">
					<div class="column-12">
						<div class="introAnimada">
								<h1 id="introA">Ante </h1>
								<h1 id="introB">Merídiem </h1>
								<span id="introC"><a href="#home">Agenda Nocturna</a></span>
						</div>


						<a href="#home" class="scroll-down" address="true"></a>

					<!--	<img class="arrow" id="arrowD" src="css/logo/arrow-down.png">-->
					</div>
				</div>

		</section>


										<!--- HOME-------->

		<div class="container">
			<div class="cabeceraTransparente">
			<section id="home" class="header">

										<!-- LOGO -->


				<div class="row">
					<div class="column-4 ">
						<img class="logo" src="css/logo/logoblack.jpg" alt="Logo">
					</div>
				<div class="column-4">
					<h1>Ante Merídiem </h1>
					<span>La agenda nocturna de ChivilCity</span>
				</div>

										<!-- LOGIN -->

				<div class="column-4 last login">
					<img src="css/icon-user.png" alt="user">
					<form method="POST" action="php/login.php">

							<?php

							if(isset($_SESSION['user_name']) && ( $_SESSION['user_state']==0 ) && ( $_SESSION['user_name']!='error')) {
								
							?>
								<ul class="show_name"> 
										<li>
											<a href=""><?php echo $_SESSION['user_name'];
												 ?>
												<script type="text/javascript">
													

												</script>
											</a>
										</li>
										<button id="button_close_session" >Cerrar sesion</button>
								</ul>
							<?php 
							
							} else { 

						if(isset($_SESSION['user_name']) && $_SESSION['user_name']=='error') {
									?>
										<script type="text/javascript">
											window.alert("Los datos ingresados son incorrectos");

										</script>
									<?php
										unset( $_SESSION['user_name'] );
										} else {
											if(isset($_SESSION['user_state']) && $_SESSION['user_state']==1){
												?>
													<script type="text/javascript">
												window.alert("usuario bloqueado");
														</script>

									<?php
											unset($_SESSION['user_state'] );
											unset($_SESSION['user_name'] );
										  }
										} 

							
									?>
									
							

							<label class="user">

								<input type="text" placeholder="User" name="user_name" required>
							</label>

							<br>

							<label class="password">

								<input type="password" placeholder="Password" name="password" required>
							</label>
							<br>
							<button type="submit" name="acceder" value="acceder"> Acceder</button>


						</form>

						<div class="tooltip">
							<button type="button" id="registrarse" onClick="show()"> Registrarse</button>
							<p class="tooltiptext">Registrate!</p>
						</div>

						
						<div class="registro" id="formularioRegistro">
							<h2> Registrarse </h2>

							<form method="POST" action=""../WebMaster/php/register.php""> <!-- FALTA COMPLETAR LA RUTA DEL PHP-->
								<label class="user-name">
									<span>Nombre Usuario</span>
									<input type="text" placeholder="" name="user_name" required>
								</label>

								<br>


								<label class="nombre">
									<span>Nombre</span>
									<input type="text" placeholder="" name="name" required>

								</label>

								<br>

								<label class="apellido">
								<span>Apellido</span>
									<input type="text" placeholder="" name="" required>

								</label>

								<br>

								<label class="mail">
									<span>E-mail</span>
									<input type="text" placeholder="" name="" required>

								</label>

								<br>

								<label class="fechaNacimiento">
									<span>Fecha de Nacimiento</span>
									<input type="text" placeholder="" name="" required>

								</label>

								<br>

								<label class="password">
									<span>Password</span>
									<input type="text" placeholder="" name="" required>

								</label>

								<br>

							</form>

							<br>

							<div class="buttons">
								<button type="button" id="cancel" onClick="D()">Cancelar </button>
								<button type="button" id="confirmar">Confirmar </button>
							</div>
				</div>
				<?php
					}
				?>
			</div>
			

				</div>
			</section>

										<!-- BUSCADOR -->

		<section class="buscador">
			<div class="row">
				<div class="column-12">
					<form action="enviar.php" method="">
						<input type="text" placeholder="Ingrese aquí su busqueda" required>
					</form>
					<input style="display:inline-block;width:10%;margin-left: -22em;" class="button" type="submit" value="Buscar">
					<img class="division" src="css/line2.png">
				</div>
			</div>
		</section>


										<!-- MAIN CONTENT -->

		<section class="main-content">
			<div class="row">
				<div class="column-6"></div>
				<div class="column-6 last">
					<img class="imageEvent" src="css/liveshow.jpg">

				</div>
			</div>
			<div class="row">

											<!-- NEXT EVENTS -->

				<div class="column-3">
					<img class="imgNextEvents" src="css/mia.gif">
					<h2>Proximos Eventos</h2>
					<div class="next-events">
					</div>
				</div>
				<div class="column-9 last">

												<!-- EVENTS -->

					<div class="events">

							<div class="publicaciones">
								<img src="css/publicaciones/sticker5.png" alt="">
								<h2>Banda Show Bar Cultural 'Los Indios'</h2>
								<span>Sabado a la hora que pinte</span>
								<br>
								<a href=""> mas informacion</a>

							</div>

							<div class="publicaciones">
								<img src="css/publicaciones/sticker5.png" alt="">
								<h2>Banda Show Bar Cultural 'Los Indios'</h2>
								<span>Sabado a la hora que pinte</span>
								<br>
								<a href=""> mas informacion</a>

							</div>

							<div class="publicaciones">
								<img src="css/publicaciones/sticker5.png" alt="">
								<h2>Banda Show Bar Cultural 'Los Indios'</h2>
								<span>Sabado a la hora que pinte</span>
								<br>
								<a href=""> mas informacion</a>

							</div>

							<div class="publicaciones">
								<img src="css/publicaciones/sticker5.png" alt="">
								<h2>Banda Show Bar Cultural 'Los Indios'</h2>
								<span>Sabado a la hora que pinte</span>
								<br>
								<a href=""> mas informacion</a>

							</div>

							<div class="publicaciones">
								<img src="css/publicaciones/sticker5.png" alt="">
								<h2>Banda Show Bar Cultural 'Los Indios'</h2>
								<span>Sabado a la hora que pinte</span>
								<br>
								<a href=""> mas informacion</a>

							</div>

							<div class="publicaciones">
								<img src="css/publicaciones/sticker5.png" alt="">
								<h2>Banda Show Bar Cultural 'Los Indios'</h2>
								<span>Sabado a la hora que pinte</span>
								<br>
								<a href=""> mas informacion</a>

							</div>

							<div class="publicaciones">
								<img src="css/publicaciones/sticker5.png" alt="">
								<h2>Banda Show Bar Cultural 'Los Indios'</h2>
								<span>Sabado a la hora que pinte</span>
								<br>
								<a href=""> mas informacion</a>

							</div>

							<div class="publicaciones">
								<img src="css/publicaciones/sticker5.png" alt="">
								<h2>Banda Show Bar Cultural 'Los Indios'</h2>
								<span>Sabado a la hora que pinte</span>
								<br>
								<a href=""> mas informacion</a>

							</div>

							<div class="publicaciones">
								<img src="css/publicaciones/sticker5.png" alt="">
								<h2>Banda Show Bar Cultural 'Los Indios'</h2>
								<span>Sabado a la hora que pinte</span>
								<br>
								<a href=""> mas informacion</a>

							</div>

							<div class="publicaciones">
								<img src="css/publicaciones/sticker5.png" alt="">
								<h2>Banda Show Bar Cultural 'Los Indios'</h2>
								<span>Sabado a la hora que pinte</span>
								<br>
								<a href=""> mas informacion</a>

							</div>


					</div>
				</div>
			</div>

		</section>

										<!-- FOOTER -->

		<section class="footer">

			<div class="row">
				<div class="column-12">
					<ul>
						<li><a href="#">Contacto |</a></li>
						<li><a href="#">Sobre Ante Merídiem  |</a></li>
						<li><a href="#">Ayuda  |</a></li>
						<li><a href="#">Legales  |</a></li>
						<li><a href="#">Politica de Privacidad  |</a></li>
						<li><a href="#">© Copyright 2017  </a></li>
					</ul>
				</div>
			</div>

		</section>

		</div>

		<!-- script -->

		 <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>

		 <script src="js/animation.js"></script>


</html>
