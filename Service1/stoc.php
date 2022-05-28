<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
   session_start();
}

include "./models/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){ 
   if(isset($_POST['nr'])){
      if(isset($_POST['sub'])){
         $nr = (int)$_POST['nr'] * -1;
         add($nr);
      }
      else if (isset($_POST['add'])){
         $nr = (int)$_POST['nr'];
         add($nr);
      }
   }
   else {
      "<script>
      alert('Introduceti un numar!');
      window.location.href='stoc.php';
      </script>";
   }
}


function add($nr){

   $id = $_POST['id'];

   include("db/connection.php");
   $select = "SELECT * from piese where ID='$id'";
   $query = mysqli_query($conn, $select);
   $sum = 0;
   
   if (mysqli_num_rows($query) > 0) {


      while ($row = mysqli_fetch_assoc($query)) {
         $sum = (int)$row["Numar"] + (int)$nr;
      }
   }
   if( $sum < 0) {
      echo "<script>
      alert('Stocul nu poate fi negativ!');
      window.location.href='stoc.php';
      </script>";
   }
   else {
      $update = "UPDATE piese SET Numar=$sum where ID='$id'";
      $query = mysqli_query($conn, $update);
   }
}
?>
<body style="background-color: white">


   <?php include_once "./models/navbar.php" ?>

   <h3 style="text-align:center">
      <a>Vizualizare stoc</a>
      <br>
      <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
   </h3>
   
   <?php

   include("db/connection.php");

   
   $select = "SELECT * from piese";
   $query = mysqli_query($conn, $select);

   mysqli_close($conn);

   $tabel = "<table border=1 style='width:100%;overflow-x:auto;'>";
   $tabel .= "<tr style='background-color:black; color:white;'>
      <td align=center>ID</td>";
   $tabel .= "<td align=center>Nume</td>";
   $tabel .= "<td align=center>Bucati</td>";
   $tabel .= "<td align=center>Adauga/Scade</td>";
   $tabel .= "
   </tr>";


   if (mysqli_num_rows($query) > 0) {


      while ($row = mysqli_fetch_assoc($query)) {

         $tabel .= "<tr style='background-color:gray'>
      <td align=center>" . $row["ID"] . "</td>
      <td align=center>" . $row["NumePiesa"] . "</td>
      <td align=center>" . $row["Numar"] . "</td>
      <td align=center>". '<form action="stoc.php" method="post">
         <input type="submit" class= button name="sub" value="-" />
         <input type="text" placeholder="Adauga/Scade" name="nr" value=""/>
         <input type="submit" class= button name="add" value="+" />
         <input type="hidden" name="id" value="' .$row["ID"].'"/>
      </form>
      </td></tr>';
      }
      $tabel .= "</table>";
      echo $tabel;
   }
   ?>

</body>