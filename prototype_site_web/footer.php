<html>
  
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="footercss.css">
 
  
  <footer>

        <div class="container-fluid grey">
          <div class="container">
            <nav>
            <ul><br><br>
            	
              <button id="myBtn" class="btn btn-success">Nous contacter 
              </button><br><!--Pour ouvrir le modal-->
              	<!--Le modal-->
              	<div id="myModal" class="modal">
              		<!--Contenu du modal-->
              		<div class="modal-content">
              			<!--header du modal-->
              			<div class="modal-header">
              			<span class="close">&times;</span>
              			<h2>Nous contacter</h2>
              		</div>
              		<div class="modal-body">
              			<?php include 'contact.php'; ?> 
            
              		</div>
              		</div>
              	</div>	


<article align="center">          
<a id="fbIco" href="https://www.facebook.com/cuisine.vie.16"> 
  <img src="img/icon/fb_ico.png"> 
    
 </a>
 
<a id="instaIco" href="https://www.instagram.com/cuisinevie_/">
  <img  src="img/icon/insta_ico.png">
    
 </a>

 <a id="twiIco" href="https://twitter.com/cuisine_vie">
  <img  src="img/icon/twi_ico.png">
    
 </a>
</article><br>
               <p align="center" class="Copyright"> Copyright &copy; 2018 all rights reserved</p>
            </ul>
          </nav>
        </div>
      </div>
  <script src="contactjs.js"></script>
  </footer>
</body>
</html>

