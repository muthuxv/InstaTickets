<center>
<h2> Ajout d'un Artiste  </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Nom </td> 
			<td> <input type="text" name="nom" value ="<?php echo ($lArtiste!=null) ? $lArtiste['nom']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Photo </td> 
			<td> <input type="text" name="photo_artiste" value ="<?php echo ($lArtiste!=null) ? $lArtiste['photo_artiste']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Genre : </td> 
			<td> <select name ="idgenre">
					 <?php
					 	foreach ($lesGenres as $unGenre) {
					 		echo "<option value ='".$unGenre['idgenre']."'>".$unGenre['nom']."</option>";
					 	}
					 ?>

				</select>
			</td>
		</tr>


			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" <?php echo ($lArtiste!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> ></td>
		</tr>
	</table>
</form>

</center>