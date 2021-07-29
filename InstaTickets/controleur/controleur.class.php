<?php
	require_once ("modele/modele.class.php"); 

	class Controleur {
		private $unModele ; 

		public function   __construct ($serveur, $bdd, $user, $mdp){
			//on instancie le modele 
			$this->unModele = new Modele ($serveur, $bdd, $user, $mdp); 
		}

		public function getTable (){
			return $this->unModele->getTable() ;
		}
		public function setTable ($uneTable)
		{
			$this->unModele->setTable($uneTable);
		}

		public function selectAll ($tab)
		{
			//on récupère les clienst 
			$lesResultats = $this->unModele->selectAll($tab); 

			//je traite les clients 

			//je renvoie les clients 
			return $lesResultats; 
		}

		public function insert ($tab){
			//on controle les données s'il ya lieu
			$this->unModele->insert($tab);
		}
		public function selectIdmembre ($emailentree) {
			return $this->unModele->selectIdmembre($emailentree);
		}
		public function selectMembre ($emailentree) {
			return $this->unModele->selectMembre ($emailentree);
		}
		public function selectIDMembre1 ($emailentree){
			return $this->unModele->selectIDMembre($emailentree);
		}




		
		public function nbTuples ($uneTable)
		{
			$this->setTable($uneTable); 
			return $this->unModele->nbTuples(); 
		}

		public function delete ($tab)
		{
			$this->unModele->delete ($tab);
		}

		public function selectWhere ($tab)
		{
			return $this->unModele->selectWhere($tab);
		}

		public function selectWhereAll ($tab)
		{
			return $this->unModele->selectWhereAll($tab);
		}

		public function update($tab, $where){
			$this->unModele->update($tab, $where);
		}
		
	}

?>