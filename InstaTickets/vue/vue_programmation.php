<center><h1>Programmation</h1></center>
<?php
	echo "<div class ='container_box'>";
	foreach ($lesConcerts as $unConcert) {

					echo "<div class ='box'>
						<div class ='boxDate'>";
							echo $unConcert['titre'];
						echo "</div>";
						echo "<div class ='boxDetail'>";
							echo "<img src=".$unConcert['image'].">";
						echo"</div>";
					echo "<a href='index.php?page=2'><div class ='boxTicInf'>
							<div class ='boxTicket'>Réserver</div></a>";
							echo"<a href='index.php?page=2'><div class ='boxInfo'>";
							echo $unConcert['dateconcert'];
							echo "</div></a>
						</div>
					</div>";

	}
	echo"</div>";
	?>

