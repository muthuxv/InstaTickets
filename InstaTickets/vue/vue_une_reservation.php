<?php

$unControleur->setTable ("ticket_historique");
$where=array("idticket"=> $_GET['idticket']);
$unTicket = $unControleur->selectWhere ($where);

echo
"<h1>" .$unTicket['idticket']. "</h1>
<p><b>Date d'achat : </b>" .$unTicket['dateachat']. "</p>
<p><b>Nombre de tickets : </b>" .$unTicket['nbticket']. "</p>
</div>
<p><b>Id membre : </b>" .$unTicket['idmembre']. "</p>
<p><b>Id concert : </b>" .$unTicket['idconcert']. "</p>
<p><b>Etat : </b>" .$unTicket['etat']. "</p>";

?>