<center>
<h2> Ajout d'un Commentaire  </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Date : </td> 
			<td> <input type="date" name="datecomment" value ="<?php echo ($leCommentaire!=null) ? $leCommentaire['datecomment']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Contenu : </td> 
			<td> 
				<textarea  name="contenu"  rows="5" cols="33"> </textarea>
			</td>
		</tr>
		<tr> 
			<td> Note </td> 
			<td> <input type="text" name="note" value ="<?php echo ($leCommentaire!=null) ? $leCommentaire['note']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Le concert : </td> 
			<td> <select name ="idconcert">
					 <?php
					 	foreach ($lesConcerts as $unConcert) {
					 		echo "<option value ='".$unConcert['idconcert']."'>".$unConcert['titre']."  ".$unConcert['dateconcert']."</option>";
					 	}
					 ?>
				</select>
			</td>
		</tr>

			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" <?php echo ($leCommentaire!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> ></td>
		</tr>
	</table>
</form>

</center>
