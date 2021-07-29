<center>
<h2> Liste des Commentaires </h2>

<table class = "styled-table" border = "1">
	<tr> 
			<td> Id Commentaire </td>
			<td> Date Commentaire </td> <td> Contenu  </td>
			<td> Note </td> <td> Id Concert </td> <td> Id Membre </td> 
			<?php
			if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
				{
			echo "<td> Opérations </td>";
			}
			?>			
	</tr>

	<?php 
	foreach ($lesCommentaires as $unCommentaire) {
		echo "<tr> 
				<td>".$unCommentaire['idcomment']." </td>
				<td>".$unCommentaire['datecomment']." </td>
				<td>".$unCommentaire['contenu']." </td>
				<td>".$unCommentaire['note']." </td>
				<td>".$unCommentaire['idconcert']." </td>
				<td>".$unCommentaire['idmembre']." </td>" ;

			  	if (isset($_SESSION['droits']) && $_SESSION['droits'] =="admin")
				{
				echo "<td>
				<a href='index.php?page=8&action=sup&idcomment=".$unCommentaire['idcomment']."'>
				<img src ='image/sup.jpg' height='30' witdh='30'> </a>

				<a href='index.php?page=8&action=edit&idcomment=".$unCommentaire['idcomment']."'>
				<img src ='image/edit.png' height='30' witdh='30'> </a>

				</td>"; 
				}

			  echo "</tr>";
	}
	?>

</table>
</center>