<center>
<h2> Liste des Tickets </h2>

<table class ="styled-table" border = "1">
	<tr> 
			<td> Id Ticket </td>
			<td> Date D'achat </td> <td> Nombre de tickets </td>
			<td> Id Membre </td> <td> Id Concert </td> 
			<?php
			if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
				{
			echo "<td> Opérations </td>";
			}
			?>	
			
	</tr>

	<?php 
	foreach ($lesTickets as $unTicket) {
		echo "
			<tr> 
				<td>".$unTicket['idticket']." </td>
				<td>".$unTicket['dateachat']." </td>
				<td>".$unTicket['nbticket']." </td>
				<td>".$unTicket['idmembre']." </td>
				<td>".$unTicket['idconcert']." </td>" ;
			 

			 	if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
				{
				echo "<td>
				<a href='index.php?page=2&action=sup&idticket=".$unTicket['idticket']."'>
				<img src ='image/sup.jpg' height='30' witdh='30'> </a>
				</td>"; 
				}

			  echo "</tr>";
	}
	?>

</table>
</center>