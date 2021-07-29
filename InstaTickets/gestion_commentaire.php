<?php
if(isset($_SESSION['email']) && $_SESSION['droits'] =="admin")
	{
		$unControleur->setTable ("concert");
		$tab=array("idconcert", "titre","dateconcert");
		$lesConcerts = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("membre");
		$tab=array("idmembre", "email");
		$lesMembres = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("commentaire");
		
		$leCommentaire = null; 
		if (isset($_GET['action']) && isset($_GET['idcomment']))
		{
			$idcomment = $_GET['idcomment']; 
			$action = $_GET['action'];

			switch ($action){
				case "sup" : 
						$tab=array("idcomment"=>$idcomment); 
						$unControleur->delete($tab);
						break;
				case "edit" : 
						$tab=array("idcomment"=>$idcomment); 
						$leCommentaire = $unControleur->selectWhere ($tab);
						break; 
			}
		}


		require_once("vue/vue_insert_commentaire.php"); 

		if (isset($_POST['modifier'])){
		$tab=array("datecomment"=>$_POST['datecomment'], "contenu"=>$_POST['contenu'],
			"note"=>$_POST['note'],"idconcert"=>$_POST['idprojet'],"idmembre"=>$_SESSION['idmembre']);
			$where =array("idcomment"=>$idcomment);

			$unControleur->update($tab, $where);
			header("Location: index.php?page=8");
		}

		if (isset($_POST['valider'])){
		$tab=array("datecomment"=>$_POST['datecomment'], "contenu"=>$_POST['contenu'],
			"note"=>$_POST['note'],"idconcert"=>$_POST['idconcert'],"idmembre"=>$_SESSION['idmembre']);
			$unControleur->insert($tab);
		}
		$tab=array("*");
		$lesCommentaires = $unControleur->selectAll ($tab); 
		require_once("vue/vue_les_commentaires.php");
		 
	} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="user")
			{
		$unControleur->setTable ("concert");
		$tab=array("idconcert", "titre","dateconcert");
		$lesConcerts = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("membre");
		$tab=array("idmembre", "email");
		$lesMembres = $unControleur->selectAll ($tab); 
				
		$leCommentaire = null;
		$unControleur->setTable ("commentaire");
		
		require_once("vue/vue_insert_commentaire.php"); 

		if (isset($_POST['modifier'])){
		$tab=array("datecomment"=>$_POST['datecomment'], "contenu"=>$_POST['contenu'],
			"note"=>$_POST['note'],"idconcert"=>$_POST['idconcert'],"idmembre"=>$_SESSION['idmembre']);
			$where =array("idcomment"=>$idcomment);

			$unControleur->update($tab, $where);
			header("Location: index.php?page=8");
		}

		if (isset($_POST['valider'])){
		$tab=array("datecomment"=>$_POST['datecomment'], "contenu"=>$_POST['contenu'],
			"note"=>$_POST['note'],"idconcert"=>$_POST['idconcert'],"idmembre"=>$_SESSION['idmembre']);
			$unControleur->insert($tab);
			var_dump($tab);
		}
		$tab=array("*");
		$lesCommentaires = $unControleur->selectAll ($tab); 
		require_once("vue/vue_les_commentaires.php");
			}
		else{
			$unControleur->setTable ("commentaire");
			$leCommentaire = null;

			$tab=array("*");
			$lesCommentaires = $unControleur->selectAll ($tab); 
			require_once("vue/vue_les_commentaires.php");
			echo "<center><p style = 'font-size : 50px;'>Veuillez vous connecter pour ajouter un commentaire !</p></center>";
			}
?>