<center>
<h2> Liste des Réservations </h2>

<table class = "styled-table" border = "1">
	<tr> 
			<td> Id Ticket </td>
			<td> Date D'achat </td> <td> Nombre de tickets </td>
			<td> Id Membre </td> <td> Id Concert </td> <td> Etat </td>
			<td> Details </td>

	</tr>


<?php 
	foreach ($lesTickets as $unTicket) {
		echo "
		
			<tr> 
				<td>".$unTicket['idticket']." </td>
				<td>".$unTicket['dateachat']." </td>
				<td>".$unTicket['nbticket']." </td>
				<td>".$unTicket['idmembre']." </td>
				<td>".$unTicket['idconcert']." </td>
				<td>".$unTicket['etat']." </td>
				<td><a href='index.php?page=45&idticket=".$unTicket['idticket']."'><p> Details </p></a></td>";
			  echo "</tr>" ;

	}
	?>

</table>
</center>