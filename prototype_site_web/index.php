<?php
	require "header.php";
?>
<body>
  <br><br>
<div align="center" id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active"><!--classe active pour que le carousel s'affiche-->
      <img src="img/good.png" alt="good">
    </div>

    <div class="item">
      <img src="img/nutrition.jpg" alt="cuisine">
    </div>

    <div class="item">
      <img src="img/supersmoothie.png" alt="smoothie">
    </div>
  </div>


  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<br><br><br>
			<div class ="section1"></div>

      <div>
        <h1 align="center" class="black"> De la cuisine pour tous !</h1>
      </div>

      <div class="section2"></div>
<br><br><br>
      <div class="container">
        <div class ="row">
          <aside class="col-md-6 col-lg-6">
            <h1 class="black" align="center">La Cuisine selon Vous </h1>
            <br><br>
            <h3 align="center">La gourmandise est un très jolie défaut</h3>
            <br><br>
            <h3 align="center">"La cuisine est la base du véritable bonheur" A.Escoffier</h2>
          </aside>
          <article class="col-md-6 col-lg-6">
            <marquee><img class= cuisine src="img/cuisine.jpg" alt="image manquante" width="580px"></marquee><!--Balise marquee pour faire défiler les images-->
          </article>
        </div>
      </div>
      <br><br><br>

      <?php require "footer.php";
?>