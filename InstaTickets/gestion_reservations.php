<?php
if(isset($_SESSION['email']) && $_SESSION['droits'] =="admin")
	{
		$unControleur->setTable ("lieu");
		$tab=array("idlieu", "nom", "adresse", "capacite");
		$lesLieux = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("reservation_salle");

		$laReservation = null; 
		if (isset($_GET['action']) && isset($_GET['idreservation']))
		{
			$idreservation = $_GET['idreservation']; 
			$action = $_GET['idreservation'];

			switch ($action){
				case "sup" : 
						$tab=array("idreservation"=>$idreservation); 
						$unControleur->delete($tab);
						break;
				case "edit" : 
						$tab=array("idreservation"=>$idreservation); 
						$laReservation = $unControleur->selectWhere ($tab);
						break; 
			}
		}

		require_once("vue/vue_insert_reservation.php"); 

		if (isset($_POST['modifier'])){
		$tab=array("nom"=>$_POST['nom'], "prenom"=>$_POST['prenom'],
			"email"=>$_POST['email'], "entite"=>$_POST['entite'], "datedemande"=>$_POST['datedemande'],"idlieu"=>$_POST['idlieu'],"message"=>$_POST['message']);
			$where =array("idreservation"=>$idreservation);

			$unControleur->update($tab, $where);
			header("Location: index.php?page=4");
		}

		if (isset($_POST['valider'])){
		$tab=array("nom"=>$_POST['nom'], "prenom"=>$_POST['prenom'],
			"email"=>$_POST['email'], "entite"=>$_POST['entite'], "datedemande"=>$_POST['datedemande'],"idlieu"=>$_POST['idlieu'],"message"=>$_POST['message']);
			$unControleur->insert($tab);
			echo('Enregistrement Effectué avec succés');

		}
		$tab=array("*");
		$lesReservations = $unControleur->selectAll ($tab); 
		require_once("vue/vue_les_reservations.php");


		 
	} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="user")
			{
		$laReservation = null; 


		$unControleur->setTable ("lieu");
		$tab=array("idlieu", "nom", "adresse", "capacite");
		$lesLieux = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("reservation_salle");
		$tab=array("*");
		$lesReservations = $unControleur->selectAll  ($tab);
		require_once("vue/vue_insert_reservation.php"); 
		if (isset($_POST['valider'])){
		$tab=array("nom"=>$_POST['nom'], "prenom"=>$_POST['prenom'],
			"email"=>$_POST['email'], "entite"=>$_POST['entite'], "datedemande"=>$_POST['datedemande'],"idlieu"=>$_POST['idlieu'],"message"=>$_POST['message']);
			$unControleur->insert($tab);
			echo('Enregistrement Effectué avec succés');

		}
	}else{
		echo "<center><p style = 'font-size : 50px;'>Veuillez vous connecter pour accèder à cette page !</p></center>";
	}
		
?>