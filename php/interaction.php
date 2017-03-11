<?php 
	

include("connections.php");
session_start();


if ( isset($_GET['action'])&& isset($_SESSION['user_name'])&&isset($_GET['id_publication'])){



	
	$id_publication_action = $_GET['id_publication'];


	switch ($_GET['action']) {
		case 'iminsterested':
		include("functions.php");
		interest_me($id_publication_action );

			break;
		case 'imninsterested':
		include("functions.php");
		desinterest_me($id_publication_action );

			break;
		case 'imgoing':
		include("functions.php");
		assitant_me($id_publication_action );

			break;
		case 'imngoing':
		include("functions.php");
		desassitant_me($id_publication_action );

			break;	
		default:
				header("Location: screen_publication.php?id_publication=$id_publication_action");
			
			break;
	}
}





 ?>
