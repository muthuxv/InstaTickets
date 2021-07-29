<?php	
	echo '<ul>
			<li><a href="index.php?page=0"> Accueil </a></li>
			<li><a href="index.php?page=1"> Programmation </a></li>';

			if (isset($_SESSION['droits']) && $_SESSION['droits'] == 'admin') {

				echo'<li class="dropdown">
    				<a href="javascript:void(0)" class="dropbtn">Ajouter / Lister</a>
    				<div class="dropdown-content">
      					<a href="index.php?page=6">Artistes</a>
      					<a href="index.php?page=7">Membres</a>
      					<a href="index.php?page=8">Commentaire</a>
    				</div>
  					</li>';
			}

	echo	'<li><a href="index.php?page=2"> Billetterie </a></li>
			<li><a href="index.php?page=3"> Demande de réservation </a></li>
			<li><a href="index.php?page=4"> Contact  </a></li>';

			if(isset($_SESSION['email']) && !empty($_SESSION['email']) ){
				echo '<li><a href="index.php?page=10">Mes réservations</a><li>';
				echo '<li><a href="index.php?page=5">Déconnexion</a><li>'; 
			}else{
				echo'<li><a href="index.php?page=11"><img src="image/membre.png" class="imgmembre"/></a></li>';
			}
		echo'</ul>';
?>

