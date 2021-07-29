<?php
	class Modele {

		private $unPdo , $uneTable, $unId; 

		public function   __construct ($serveur, $bdd, $user, $mdp)
		{
			$this->unPdo =null; 
			try{
		$this->unPdo = new PDO ("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);
			}
			catch (PDOException $exp){
				echo "Erreur de connexion au serveur : ".$serveur."/".$bdd ;
			}
		}
		public function getTable (){
			return $this->uneTable ;
		}
		public function setTable ($uneTable)
		{
			$this->uneTable = $uneTable;
		}

		public function selectAll ($tab) {
			if ($this->unPdo != null){
				$chaine = implode(", ", $tab); 
				$requete = "select ".$chaine." from " .$this->uneTable. " ; ";
				$select = $this->unPdo->prepare ($requete); 
				$select->execute (); 
				return $select->fetchAll();  
			} else {
				return null; 
			}
		}
		public function insert ($tab){
			//$tab est le $_POST du formulaire 
			if ($this->unPdo != null){
				$listeChamps = array(); 
				$donnees =array();
				$listeAttributs =array();
				foreach ($tab as $cle => $valeur) {
					 $listeChamps[] = ":".$cle;
					 $donnees[":".$cle] = $valeur;
					 $listeAttributs[] = $cle;
				}
				$chaineChamps = implode(", ", $listeChamps);
				$chaineAttributs = implode(", ", $listeAttributs);

				$requete = "insert  into  ".$this->uneTable."(".$chaineAttributs.")  values( ".$chaineChamps.") ; " ;
				$insert = $this->unPdo->prepare ($requete); 
				$insert->execute ($donnees); 
			}
		}

		public function nbTuples ()
		{
			if ($this->unPdo != null){
				$requete = "select count(*) as nb from  ".$this->uneTable. ";" ; 
				$count = $this->unPdo->prepare ($requete); 
				$count->execute (); 
				$resultat = $count->fetch(); 
				return $resultat['nb'];
			}
			else {
				return 0; 
			}
		}

		public function delete ($tab)
		{
			if ($this->unPdo != null){
				$listeChamps = array(); 
				$donnees =array();
				foreach ($tab as $cle => $valeur) {
					$listeChamps[] = $cle." = ".":".$cle ;
					$donnees[":".$cle] = $valeur;
				}
				$chaineChamps = implode(" and ", $listeChamps); 
				$requete ="delete from   ".$this->uneTable." where  ".$chaineChamps.";" ;
				 
				$delete = $this->unPdo->prepare ($requete); 
				$delete->execute ($donnees); 

			}
		}
		public function selectIdmembre ($emailentree) {
				$requete = "select idmembre from membre where email "."= \"".$emailentree."\" ;";
				$selectid = $this->unPdo->prepare ($requete); 
				$selectid->execute (); 
				$resultat = $selectid->fetch(); 
				return $resultat[0];
		}
		public function selectMembre ($emailentree){
		$sql = "SELECT idmembre FROM membre WHERE email ='$emailentree'";
		$req = mysqli_query($sql); 
		return $req;
		}
		public function selectIDMembre1 ($emailentree){
			$sql = 'select idmembre from membre where email ='.$emailentree.';' ;
			$req = $bdd->query($sql);

			//$req = $bdd ->query("SELECT idmembre from membre where idmembre = '".$emailentree."'");
			//$result = $req -> fetch(PDO::FECTH_OBJ);
			$req -> $idmembre;
			return $idmembre;
		}
		


		public function selectWhere ($tab)
		{
			if ($this->unPdo != null){
				//construction du where 
				$listeChamps = array(); 
				$donnees =array();
				foreach ($tab as $cle => $valeur) {
					$listeChamps[] = $cle." = ".":".$cle ;
					$donnees[":".$cle] = $valeur;
				}
				$chaineChamps = implode(" and ", $listeChamps); 

				$requete = "select * from   ".$this->uneTable. " where ".$chaineChamps.";" ;
				$select = $this->unPdo->prepare ($requete); 
				$select->execute ($donnees); 
				return $select->fetch(); //un seul résultat.
			}
			else
			{
				return null; 
			}
		}

		public function selectWhereAll ($tab)
		{
			if ($this->unPdo != null){
				//construction du where 
				$listeChamps = array(); 
				$donnees =array();
				foreach ($tab as $cle => $valeur) {
					$listeChamps[] = $cle." = ".":".$cle ;
					$donnees[":".$cle] = $valeur;
				}
				$chaineChamps = implode(" and ", $listeChamps); 

				$requete = "select * from   ".$this->uneTable. " where ".$chaineChamps.";" ;
				$select = $this->unPdo->prepare ($requete); 
				$select->execute ($donnees); 
				return $select->fetchAll();  //plusieurs résultats
			}
			else
			{
				return null; 
			}
		}
		public function update($tab, $where)
		{
			if ($this->unPdo != null){
				//construction du where 
				$listeChamps = array(); 
				$donnees =array();
				foreach ($where as $cle => $valeur) {
					$listeChamps[] = $cle." = ".":".$cle ;
					$donnees[":".$cle] = $valeur;
				}
				$chaineChamps = implode(" and ", $listeChamps); 

				//construction des valeurs 
				$listeValeurs = array ();
				foreach ($tab as $cle => $valeur) {
					$listeValeurs[] = $cle." = ".":".$cle ;
					$donnees[":".$cle] = $valeur;
				}
				$chaineValeurs = implode(", ", $listeValeurs);
				$requete = " update  ".$this->uneTable." set ".$chaineValeurs."  where  ".$chaineChamps.";"; 
				
				$update = $this->unPdo->prepare ($requete); 
				$update->execute ($donnees); 
			}
		}
	}
?>
