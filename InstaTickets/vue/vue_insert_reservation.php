<center>
<h2> Demande de réservation de la salle : </h2>
<form method ="post" action ="">
	<table>
	<tr>
		<tr> 
			<td> Nom </td> 
			<td> <input type="text" name="nom" value ="<?php echo ($laReservation!=null) ? $laReservation['nom']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Prénom </td> 
			<td> <input type="text" name="prenom" value ="<?php echo ($laReservation!=null) ? $laReservation['prenom']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Email </td> 
			<td> <input type="text" name="email" value ="<?php echo ($laReservation!=null) ? $laReservation['email']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Entite : </td> 
			<td> <select name ="entite">
					<option value="Organisme"> Organisme </option>
					<option value="Association"> Association </option>
					<option value="Artiste"> Artiste </option>
					<option value="autre"> Autre </option>
				</select>
			</td>
		</tr>
		<tr> 
			<td> Date demandée : </td> 
			<td> <input type="date" name="datedemande" value ="<?php echo ($laReservation!=null) ? $laReservation['date']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Le Lieu : </td> 
			<td> <select name ="idlieu">
					 <?php
					 	foreach ($lesLieux as $unLieu) {
					 		echo "<option value ='".$unLieu['idlieu']."'>".$unLieu['nom']."  ".$unLieu['adresse']." ".$unLieu['capacite']."</option>";
					 	}
					 ?>
				</select>
			</td>
		</tr>
		<tr> 
			<td> Message : </td> 
			<td> <input type="text" name="message" value ="<?php echo ($laReservation!=null) ? $laReservation['message']:""; ?>"></td>
		</tr>
		<td>  <input type="reset" name="annuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($laReservation!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> ></td>
	</tr>

	</table>
</form>
</center>