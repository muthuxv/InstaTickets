<?php
if(isset($_SESSION['email']) && $_SESSION['droits'] =="admin")
	{
		$unControleur->setTable ("concert");
		$tab=array("idconcert", "titre", "dateconcert");
		$lesConcerts = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("ticket_historique");
		$leTicket = null; 
		if (isset($_GET['action']) && isset($_GET['idticket']))
		{
			$idticket = $_GET['idticket']; 
			$action = $_GET['action'];

			switch ($action){
				case "sup" : 
						$tab=array("idticket"=>$idticket); 
						$unControleur->delete($tab);
						break;
			}
		}

		require_once("vue/vue_insert_tickets.php"); 

		if (isset($_POST['valider'])){
			$today  = date("y-m-d");
		//	$membreID = $_SESSION['idmembre'];
		$tab=array("dateachat"=>$today, "nbticket"=>$_POST['nbticket'],
			"idmembre"=>$_SESSION['idmembre'],"idconcert"=>$_POST['idconcert']);
			$unControleur->insert($tab);
			echo('<center><p style="font-size:48px"> Enregistrement effectué avec succès !</p></center>');

		}
		$tab=array("*");
		$lesTickets = $unControleur->selectAll ($tab); 
		require_once("vue/vue_les_tickets.php");


		 
	} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="user")
			{
		$unControleur->setTable ("concert");
		$tab=array("idconcert", "titre", "dateconcert");
		$lesConcerts = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("ticket_historique");
		$leTicket = null;

		$unControleur->setTable ("ticket_historique");
		$tab=array("*");
		$lesTickets = $unControleur->selectAll  ($tab);
		require_once("vue/vue_insert_tickets.php"); 
		if (isset($_POST['valider'])){
		$today  = date("y-m-d");

		$tab=array("dateachat"=>$today, "nbticket"=>$_POST['nbticket'],
			"idmembre"=>$_SESSION['idmembre'],"idconcert"=>$_POST['idconcert']);
			$unControleur->insert($tab);
			echo('Enregistrement Effectué avec succés');

	}
}else{
		echo "<center><p style = 'font-size : 50px;'>Veuillez vous connecter pour accèder à cette page !</p></center>";
	}
		
?>