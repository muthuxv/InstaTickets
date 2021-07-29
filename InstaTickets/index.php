<?php
	session_start();
	require_once ("controleur/controleur.class.php");
	require_once ("conf/config.ini"); 
	//instancier la classe Controleur 
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>InstaTicket</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="image/LogoTicket.png"/>
  		<link rel="stylesheet" type="text/css" href="css/style.css">
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
<body>	
		<?php echo "<div id='content'>"; ?>
		
			<?php

			include 'header.php' ;

			if (isset($_GET['page']) && $_GET['page'] == "11") 
				{
					require_once("connexion.php");
                    require_once("inscription.php");
                } 
		
			if(isset($_GET['page'])) $page = $_GET['page']; 
				else  $page = 0;
			switch ($page)
			{
				case 0 :   
					require_once("accueil.php");
				break; 
				case 1 : 
				    require_once("programmation.php");
				break; 
				case 2 :
					require_once("gestion_tickets.php");
				break; 
				case 3 : 
					require_once("gestion_reservations.php");
				break; 
				case 4 : 
					require_once("contact.php");
				break; 
				case 5 :
					session_destroy();
					header("Location: index.php");
					break;
				case 6 : 
					require_once("gestion_artiste.php");
				break;
				case 7 : 
					require_once("gestion_membre.php");
				break;
				case 8 : 
					require_once("gestion_commentaire.php");
				break;
				case 10 : 
					require_once("gestion_mesreservation.php");
				break;
				case 45:
					require_once("vue/vue_une_reservation.php");
				break;		
			} 
		?>
		<?php echo "</div>"; ?>
</body>
<?php include 'footer.php'; ?>
</html>