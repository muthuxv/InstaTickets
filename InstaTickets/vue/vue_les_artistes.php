<center>
<h2> Liste des artistes </h2>

<table class ="styled-table" border = "1">
	<tr> 
			<td> Id Artiste </td>
			<td> Nom </td> <td> Photo </td> 
			<td> Id Genre </td>
			<td> Opérations </td>
	</tr>

	<?php 
	foreach ($lesArtistes as $unArtiste) {
		echo "<tr> 
				<td>".$unArtiste['idartiste']." </td>
				<td>".$unArtiste['nom']." </td>
				<td>".$unArtiste['photo_artiste']." </td>
				<td>".$unArtiste['idgenre']." </td>
			 
				<td>
				<a href='index.php?page=6&action=sup&idartiste=".$unArtiste['idartiste']."'>
				<img src ='image/sup.jpg' height='30' witdh='30'> </a>

				<a href='index.php?page=6&action=edit&idartiste=".$unArtiste['idartiste']."'>
				<img src ='image/edit.png' height='30' witdh='30'> </a>

				</td>"; 
				
			  echo "</tr>";
	}
	?>

</table>
</center>