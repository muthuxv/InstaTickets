<center>
<h2> Inscription Nouveau membre. </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Nom : </td> 
			<td> <input type="text" name="nom" value ="<?php echo ($leMembre!=null) ? $leMembre['nom']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Prénom : </td> 
			<td> <input type="text" name="prenom" value ="<?php echo ($leMembre!=null) ? $leMembre['prenom']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Adresse : </td> 
			<td> <input type="text" name="adresse" value ="<?php echo ($leMembre!=null) ? $leMembre['adresse']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Téléphone : </td> 
			<td> <input type="text" name="tel" value ="<?php echo ($leMembre!=null) ? $leMembre['tel']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Email : </td> 
			<td> <input type="text" name="email" value ="<?php echo ($leMembre!=null) ? $leMembre['email']:""; ?>"></td>
		</tr>

		<tr> 
			<td>  <input type="reset" name="annuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($leMembre!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> ></td>
		</tr>
	</table>
</form>
</center>