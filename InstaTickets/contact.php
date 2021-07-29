

<?php 
$unControleur->setTable ("myguests");

require_once("vue/vue_contact.php");

if (isset($_POST['valider'])) {
	$tab=array("nom"=>$_POST['name'],"email"=>$_POST['email'], "message"=>$_POST['message']);
	$unControleur->insert($tab);
	echo "<center><p style = 'font-size : 24px;'>Votre message a bien été enregistré ! Merci !</p></center>";
}


?>