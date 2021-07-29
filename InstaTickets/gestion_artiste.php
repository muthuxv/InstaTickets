<?php

		$unControleur->setTable ("genre");
		$tab=array("idgenre", "nom");
		$lesGenres = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("artiste");
		
		$lArtiste = null; 
		if (isset($_GET['action']) && isset($_GET['idartiste']))
		{
			$idartiste = $_GET['idartiste']; 
			$action = $_GET['action'];

			switch ($action){
				case "sup" : 
						$tab=array("idartiste"=>$idartiste); 
						$unControleur->delete($tab);
						break;
				case "edit" : 
						$tab=array("idartiste"=>$idartiste); 
						$lArtiste = $unControleur->selectWhere ($tab);
						break; 
			}
		}


		require_once("vue/vue_insert_artiste.php"); 

		if (isset($_POST['modifier'])){
		$tab=array("nom"=>$_POST['nom'], "photo_artiste"=>$_POST['photo_artiste'],"idgenre"=>$_POST['idgenre']);
			$where =array("idartiste"=>$idartiste);

			$unControleur->update($tab, $where);
			header("Location: index.php?page=6");
		}

		if (isset($_POST['valider'])){
		$tab=array("nom"=>$_POST['nom'], "photo_artiste"=>$_POST['photo_artiste'],"idgenre"=>$_POST['idgenre']);
			$unControleur->insert($tab);
		}
		$tab=array("*");
		$lesArtistes = $unControleur->selectAll ($tab); 
		require_once("vue/vue_les_artistes.php");
		 

  ?>