<?php
    if (!isset($_SESSION['email'])) {
        echo "ERREUR 404, page non identifiée ";
    } else {
        $unControleur->setTable ("utilisateur");
        $where = array('idmembre' => $_SESSION['idmembre']);
        $unMembre = $unControleur->selectWhere ($where);
        $lesMembres = array($unMembre); //on construit un deuxieme tableau pour le selectAll qui contient le tableau selectWhere

        $unControleur->setTable ("ticket_historique"); // vue qui auto update la somme des dons
        $where = array('idmembre' => $_SESSION['idmembre']);

        $lesTickets = $unControleur->selectWhereAll ($where);

        require_once("vue/vue_mesreservation.php");
}
?>