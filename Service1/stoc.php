<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
   session_start();
}

include "header.php";

?>

<body style="background-color: white">


   <?php include_once "navbar.php" ?>

   <h3 style="text-align:center">
      <a>Vizualizare stoc</a>
      <br>
      <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
   </h3>

   <?php
   include_once("db/connection.php");

   $conn = OpenCon();

   $select = "SELECT * from piese";
   $query = mysqli_query($conn, $select);

   mysqli_close($conn);

   $tabel = "<table border=1 style='width:100%;overflow-x:auto;'>";
   $tabel .= "<tr style='background-color:black; color:white;'>
      <td align=center>ID</td>";
   $tabel .= "<td align=center>Nume</td>";
   $tabel .= "<td align=center>Bucati</td>";

   $tabel .= "
   </tr>";


   if (mysqli_num_rows($query) > 0) {


      while ($row = mysqli_fetch_assoc($query)) {

         $tabel .= "<tr style='background-color:gray'>
      <td align=center>" . $row["ID"] . "</td>
      <td align=center>" . $row["NumePiesa"] . "</td>
      <td align=center>" . $row["Numar"] . "</td>";
      }
      $tabel .= "</table>";
      echo $tabel;
   }
   ?>

</body>