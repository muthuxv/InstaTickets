
<?php
if (!isset($_SESSION['droits']) OR (isset($_SESSION['droits']) && $_SESSION['droits'] == 'user'))
	{

	$unControleur->setTable ("concert");
	$leConcert = null;

	$tab=array("*");
	$lesConcerts = $unControleur->selectAll ($tab); 
	require_once("vue/vue_programmation.php");

	}else{

		$unControleur->setTable ("artiste");
		$tab=array("idartiste", "nom");
		$lesArtistes = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("lieu");
		$tab=array("idlieu", "nom");
		$lesLieux = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("concert");
		
		$leConcert = null; 
		if (isset($_GET['action']) && isset($_GET['idconcert']))
		{
			$idconcert = $_GET['idconcert']; 
			$action = $_GET['action'];

			switch ($action){
				case "sup" : 
						$tab=array("idconcert"=>$idconcert); 
						$unControleur->delete($tab);
						break;
				case "edit" : 
						$tab=array("idconcert"=>$idconcert); 
						$leConcert = $unControleur->selectWhere ($tab);
						break; 
			}
		}


		require_once("vue/vue_insert_concert.php"); 

		if (isset($_POST['modifier'])){
		$tab=array("titre"=>$_POST['titre'], "image"=>$_POST['image'],
			"dateconcert"=>$_POST['dateconcert'],"descriptionconcert"=>$_POST['descriptionconcert'],"prix"=>$_POST['prix'],"idartiste"=>$_POST['idartiste'],"idlieu"=>$_POST['idlieu']);
			$where =array("idconcert"=>$idconcert);

			$unControleur->update($tab, $where);
			header("Location: index.php?page=1");
		}

		if (isset($_POST['valider'])){
		$tab=array("titre"=>$_POST['titre'], "image"=>$_POST['image'],
			"dateconcert"=>$_POST['dateconcert'],"descriptionconcert"=>$_POST['descriptionconcert'],"prix"=>$_POST['prix'],"idartiste"=>$_POST['idartiste'],"idlieu"=>$_POST['idlieu']);
			$unControleur->insert($tab);
		}
		$tab=array("*");
		$lesConcerts = $unControleur->selectAll ($tab); 
		require_once("vue/vue_les_concerts.php");
		 
	}

  ?>

