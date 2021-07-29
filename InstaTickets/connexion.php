<?php
	if ( ! isset($_SESSION['email']))
		{
			require_once ("vue/vue_connexion.php");
		}
	if (isset($_POST['seconnecter']))
		{
			$unControleur->setTable ("membre");
			$tab=array("email"=>$_POST['email'], "mdp"=>$_POST['mdp']); 
			$emailentree = $_POST['email'];

			$unUSer = $unControleur->selectWhere ($tab);
			if ($unUSer == null || $unUSer == false )
				{
				echo "<center><br /><p style='font-size:48px;'> Erreur de connexion, Veuillez vérifier vos identifiants<p></center>";
				}else if (isset($unUSer['email'])){
					$_SESSION['email'] = $unUSer['email']; 
					$_SESSION['droits'] = $unUSer['droits'];
					$membreID = $unControleur->selectIdmembre($emailentree);
					$_SESSION['idmembre'] = $membreID;
					header("Location: index.php");
				}
			}
?>