<div id='slideHome'>
    <img class="mySlides" src="image/slider1.jpg">
    <div class="captionSlide"></div>
    <img class="mySlides" src="image/slider2.jpg">
    <div class="captionSlide"></div>
    <img class="mySlides" src="image/slider3.jpg">
    <div class="captionSlide"></div>
    <button class="buttonSlideLeft" onclick="plusDivs(-1)">&#10094;</button>
    <button class="buttonSlideRight" onclick="plusDivs(1)">&#10095;</button>
</div>

<center>
<h1> Bienvenue sur InstaTicket ! </h1>
</center>

<?php

	$unControleur->setTable ("concert_recent");
	$leConcertRec = null;

	$tab=array("*");
	$lesConcertsRec = $unControleur->selectAll ($tab); 
	require_once("vue/vue_accueil.php");
  ?>
<script>
var myIndex = 0;
carousel();

function plusDivs(n) {
    var x = document.getElementsByClassName("mySlides");
    var y = document.getElementsByClassName("captionSlide");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        y[i].style.display = "none";  
    }
    if(n==-1 && myIndex==1){
       myIndex= x.length;
    }else if(n==1 && myIndex==x.length){
       myIndex= 1;
    }else{
       myIndex+= n;
    }
    x[myIndex-1].style.display = "block";  
    y[myIndex-1].style.display = "block";  
}

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var y = document.getElementsByClassName("captionSlide");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
    y[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  y[myIndex-1].style.display = "block";  
  setTimeout(carousel, 15000); // Change image every 2 seconds
}
</script>