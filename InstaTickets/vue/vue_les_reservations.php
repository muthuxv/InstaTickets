<center>

<h2> Liste des Tickets </h2>

<table class ="styled-table" border = "1">
	<tr>
			<td> Id Reservation </td>
			<td> Nom </td> <td> Prenom </td>
			<td> Email </td> <td> Entite </td> <td> Date de la demande</td><td>ID Lieu</td><td> Message </td>
			<?php
			if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
				{
			echo "<td> Opérations </td>";
			}
			?>	
			
	</tr>

	<?php 
	foreach ($lesReservations as $uneReservation) {
		echo "<tr> 
				<td>".$uneReservation['idreservation']." </td>
				<td>".$uneReservation['nom']." </td>
				<td>".$uneReservation['prenom']." </td>
				<td>".$uneReservation['email']." </td>
				<td>".$uneReservation['entite']." </td>
				<td>".$uneReservation['datedemande']." </td>
				<td>".$uneReservation['idlieu']." </td>
				<td>".$uneReservation['message']." </td>" ;
			 

			 	
				echo "<td>
				<a href='index.php?page=2&action=sup&idprojet=".$uneReservation['idreservation']."'>
				<img src ='image/sup.jpg' height='30' witdh='30'> </a>

				<a href='index.php?page=2&action=edit&idprojet=".$uneReservation['idreservation']."'>
				<img src ='image/edit.png' height='30' witdh='30'> </a>

				</td>"; 

			  echo "</tr>";
	}
	?>

</table>
</center>