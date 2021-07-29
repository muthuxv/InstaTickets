<center>
<h2> Achat d'un ticket </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Nombre de tickets : </td> 
			<td>
			<SELECT name="nbticket" size = "2" value ="<?php echo ($leTicket!=null) ? $leTicket['nbticket']:""; ?>">
			<OPTION>1
			<OPTION>2
			<OPTION>3
			<OPTION>4
			<OPTION>5
			<OPTION>6
			<OPTION>7
			<OPTION>8
			<OPTION>9
			<OPTION>10
			<OPTION>15
			<OPTION>20
			<OPTION>25
			<OPTION>30
			</SELECT>
			</td>
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
		
		

			<td>  <input type="reset" name="annuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($leTicket!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Payer' "; ?> ></td>
		</tr>
	</table>
</form>
</center>