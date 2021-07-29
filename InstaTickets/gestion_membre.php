
<?php
if(isset($_SESSION['email']) && $_SESSION['droits'] =="admin")
	{
		$unControleur->setTable ("membre");
		
		$leMembre = null; 
		if (isset($_GET['action']) && isset($_GET['idmembre']))
		{
			$idmembre = $_GET['idmembre']; 
			$action = $_GET['action'];

			switch ($action){
				case "sup" : 
						$tab=array("idmembre"=>$idmembre); 
						$unControleur->delete($tab);
						break;
				case "edit" : 
						$tab=array("idmembre"=>$idmembre); 
						$leMembre = $unControleur->selectWhere ($tab);
						break; 
			}
		}

		require_once("vue/vue_insert_membre.php"); 

		if (isset($_POST['modifier'])){
		$tab=array("nom"=>$_POST['nom'], "prenom"=>$_POST['prenom'],"adresse"=>$_POST['adresse'],
					"tel"=>$_POST['tel'], "email"=>$_POST['email']);
			$where =array("idmembre"=>$idmembre);

			$unControleur->update($tab, $where);
			header("Location: index.php?page=7");
		}

		if (isset($_POST['valider'])){
		$tab=array("nom"=>$_POST['nom'], "prenom"=>$_POST['prenom'],"adresse"=>$_POST['adresse'],
					"tel"=>$_POST['tel'], "email"=>$_POST['email']);
			$unControleur->insert($tab);
		}
		$tab=array("*");
		$lesMembres = $unControleur->selectAll ($tab); 
		require_once("vue/vue_les_membres.php");
		 
	} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="user")
			{

				$leMembre = null;
			$unControleur->setTable ("membre");

		/*require_once("vue/vue_insert_membre.php"); 

		if (isset($_POST['valider'])){
		$tab=array("nom"=>$_POST['nom'], "prenom"=>$_POST['prenom'],"adresse"=>$_POST['adresse'],
					"tel"=>$_POST['tel'], "email"=>$_POST['email']);
			$unControleur->insert($tab);
		}*/
		$tab=array("*");
		$lesMembres = $unControleur->selectAll ($tab); 
		require_once("vue/vue_les_membres.php");
			}
?>