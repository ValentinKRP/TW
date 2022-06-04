<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
   session_start();
}

include "./models/header.php";

?>
<body style="background-color: white">


   <?php include_once "./models/navbar.php" ?>

   <h3 style="text-align:center">
      <a>Vizualizare programari</a>
      <br>
      <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
   </h3>
   
   <?php

   include("db/connection.php");

   
   $select = "SELECT * from programari NATURAL JOIN conturi";
   $query = mysqli_query($conn, $select);

   mysqli_close($conn);

   $tabel = "<table border=1 style='width:100%;overflow-x:auto;'>";
   $tabel .= "<tr style='background-color:black; color:white;'>
                <td align=center>ID</td>";
   $tabel .= "<td align=center>Data Programarii</td>";
   $tabel .= "<td align=center>Ora Progamarii</td>";
   $tabel .= "<td align=center>Nume Client</td>";
   $tabel .= "
   </tr>";


   if (mysqli_num_rows($query) > 0) {


      while ($row = mysqli_fetch_assoc($query)) {

         $tabel .= "<tr style='background-color:gray'>
      <td align=center>" . $row["ID"] . "</td>
      <td align=center>" . $row["DataProgramarii"] . "</td>
      <td align=center>" . $row["OraProgramarii"] . "</td>
      <td align=center>". $row["Nume"] . " ". $row["Prenume"] . "</td>
      </tr>";
      }
      $tabel .= "</table>";
      echo $tabel;
   }
   ?>

</body>