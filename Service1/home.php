<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
  session_start();
}

// var_export($_SESSION);

include "./models/header.php";
?>

<body>

  <?php include_once "./models/navbar.php" ?>

  <img alt="?" src="image/logo.png" width="200" height="200">

  <p class="name" style="font-size:8vw;">Service Online</p>
  <div class=contact id=cont>
    <p style="font-family: Brush Script MT, Brush Script Std, cursive; font-size:25px; color:white;">Contact:</p>
    <p><img alt="?" src="image/phone-removebg-preview.jpg"><a href="tel:0734763968">0734763968</a></p>
    <p><img alt="?" src="image/fb.jpg"><a href="https://www.facebook.com/hilotemaria/" target="_blank">Facebook</a></p>
    <p><img alt="?" src="image/email.jpg"><a href="mailto: info@serviceonline.com">info@serviceonline.com</a></p>
  </div>


  <div class="slideshow-container">


    <div class="mySlides fade">

      <img alt="?" src="image/index.jpg" style="width:100%; height:400px">

    </div>

    <div class="mySlides fade">

      <img alt="?" src="image/index2.jpg" style="width:100%; height:400px">

    </div>

  </div>

  <br>
  <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
  </div>

  <!-- <script src="./JS/functii.js"></script> -->

</body>

</html>