<center><h2 style="font-size: 50px;">Concert à venir</h2></center>
<?php
	echo "<div class ='container_box'>";
	foreach ($lesConcertsRec as $unConcertRec) {

					echo "<div class ='box'>
						<div class ='boxDate'>";
							echo $unConcertRec['titre'];
						echo "</div>";
						echo "<div class ='boxDetail'>";
							echo "<img src=".$unConcertRec['image'].">";
						echo"</div>";
					echo "<a href='index.php?page=2'><div class ='boxTicInf'>
							<div class ='boxTicket'>Réserver</div></a>";
							echo"<a href='#'><div class ='boxInfo'>";
							echo $unConcertRec['dateconcert'];
							echo "</div></a>
						</div>
					</div>";
	}
	echo"</div>";
	?>
<br><br><br>
<center>
<a href="index.php?page=1" style="font-size: 25px; border: black 1px solid; padding: 5px;text-align: center;">Voir toute la programmation</a>
</center>