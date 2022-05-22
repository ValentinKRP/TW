<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
   session_start();
}

include "header.php";
?>

<body style="background-color: white">

   <?php include_once "navbar.php" ?>

   <h3 style="text-align:center">
      <a>Cereri furnizor</a>
      <br>
      <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
   </h3>


   <?php
   include_once("db/connection.php");

   $conn = OpenCon();
   


   $select = "SELECT * from cererifurnizori";
   $query = mysqli_query($conn, $select);


   $count = mysqli_num_rows($query);

   $tabel = "<table border=1 style='width:100%;overflow-x:auto;'>";
   $tabel .= "<tr style='background-color:black; color:white;'><td align=center>ID</td>";
   $tabel .= "<td align=center >Nume Furnizor</td>";
   $tabel .= "<td align=center >Data Cererii</td>";
   $tabel .= "<td align=center >Cantitate</td>";
   $tabel .= "<td align=center >Piesa</td>";
   $tabel .= "</tr>";


   if (mysqli_num_rows($query) > 0) {


      while ($row = mysqli_fetch_assoc($query)) {

         $tabel .= "<tr style='background-color:gray'><td align=center>" . $row["ID"] . "</td><td align=center>" . $row["NumeFurnizor"] . "</td><td align=center>" . $row["DataCererii"] . "</td><td align=center>" . $row["Cantitate"] . "</td><td align=center>" . $row["Piesa"] . "</td>";
      }
      $tabel .= "</table>";
      echo $tabel;
   }
   ?>

</body>