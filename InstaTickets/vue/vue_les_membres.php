<center>
<h2> Liste des Membres de notre site internet </h2>

<table class ="styled-table" border = "1">
	<tr> 
			<td> Id Membre </td>
			<td> Nom </td> <td> Prénom  </td>
			<td> Adresse </td> <td>email</td> <td> Téléphone </td> 
			<?php
			if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
				{
			echo "<td> Opérations </td>";
			}
			?>			
	</tr>


	<?php 
	foreach ($lesMembres as $unMembre) {
		echo "<tr> 
				<td>".$unMembre['idmembre']." </td>
				<td>".$unMembre['nom']." </td>
				<td>".$unMembre['prenom']." </td>
				<td>".$unMembre['adresse']." </td>
				<td>".$unMembre['email']." </td>
				<td>".$unMembre['tel']." </td>" ;

			  	if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
				{
				echo "<td>
				<a href='index.php?page=7&action=sup&idmembre=".$unMembre['idmembre']."'>
				<img src ='image/sup.jpg' height='30' witdh='30'> </a>

				<a href='index.php?page=7&action=edit&idmembre=".$unMembre['idmembre']."'>
				<img src ='image/edit.png' height='30' witdh='30'> </a>

				</td>"; 
				}

			  echo "</tr>";
	}
	?>

</table>
</center>