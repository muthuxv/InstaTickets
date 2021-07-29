<?php
	if ( ! isset($_SESSION['email']))
		{
			require_once ("vue/vue_inscription.php");
		}
	if (isset($_POST['inscrire']))
		{
			$unControleur->setTable ("membre");
			$tab=array("nom"=>$_POST['nom'], "prenom"=>$_POST['prenom'],"adresse"=>$_POST['adresse'],
					"tel"=>$_POST['tel'], "email"=>$_POST['email'], "mdp"=>$_POST['mdp']);
			$unControleur->insert($tab);
			header("Location: index.php");
			echo "<center><p style='font-size : 24px;'>Votre inscription a été réalisé avec succès. Veuillez vous connectez !</p><center>";
		}

?>