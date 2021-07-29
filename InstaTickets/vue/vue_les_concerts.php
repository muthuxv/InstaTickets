<center>
<h2> Liste des concerts </h2>

<table class ="styled-table" border = "2">
	<tr> 
			<td> Id Concert </td>
			<td> Titre </td> <td> Image </td>
			<td> Date </td> <td> Description </td> 
			<td> Prix </td> <td> Id Artiste </td>
			<td> Id Lieu </td>
			<td> Opérations </td>
	</tr>

	<?php 
	foreach ($lesConcerts as $unConcert) {
		echo "<tr> 
				<td>".$unConcert['idconcert']." </td>
				<td>".$unConcert['titre']." </td>
				<td>".$unConcert['image']." </td>
				<td>".$unConcert['dateconcert']." </td>
				<td>".$unConcert['descriptionconcert']." </td>
				<td>".$unConcert['prix']." </td>
				<td>".$unConcert['idartiste']." </td>
				<td>".$unConcert['idlieu']." </td>
			 
				<td>
				<a href='index.php?page=1&action=sup&idconcert=".$unConcert['idconcert']."'>
				<img src ='image/sup.jpg' height='30' witdh='30'> </a>

				<a href='index.php?page=1&action=edit&idconcert=".$unConcert['idconcert']."'>
				<img src ='image/edit.png' height='30' witdh='30'> </a>

				</td>"; 
				
			  echo "</tr>";
	}
	?>

</table>
</center>