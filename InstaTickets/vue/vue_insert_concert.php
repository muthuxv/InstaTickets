<center>
<div class = "formInsert" >
<h2> Ajout d'un Concert  </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Titre </td> 
			<td> <input type="text" name="titre" value ="<?php echo ($leConcert!=null) ? $leConcert['titre']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Image </td> 
			<td> <input type="text" name="image" value ="<?php echo ($leConcert!=null) ? $leConcert['image']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Date : </td> 
			<td> <input type="date" name="dateconcert" value ="<?php echo ($leConcert!=null) ? $leConcert['dateconcert']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Description : </td> 
			<td> 
				<textarea  name="descriptionconcert"  rows="5" cols="33"> </textarea>
			</td>
		</tr>
		<tr> 
			<td> Prix </td> 
			<td> <input type="text" name="prix" value ="<?php echo ($leConcert!=null) ? $leConcert['prix']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Artiste : </td> 
			<td> <select name ="idartiste">
					 <?php
					 	foreach ($lesArtistes as $unArtiste) {
					 		echo "<option value ='".$unArtiste['idartiste']."'>".$unArtiste['nom']."</option>";
					 	}
					 ?>

				</select>
			</td>
		</tr>
		<tr> 
			<td> Lieu : </td> 
			<td> <select name ="idlieu">
					 <?php
					 	foreach ($lesLieux as $unLieu) {
					 		echo "<option value ='".$unLieu['idlieu']."'>".$unLieu['nom']."</option>";
					 	}
					 ?>

				</select>
			</td>
		</tr>


			<td>  <input type="reset" name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" <?php echo ($leConcert!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> ></td>
		</tr>
	</table>
</form>
</div>	
</center>