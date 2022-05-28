<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
   session_start();
}

function clean($string)
{
   $string = str_replace(' ', '-', $string);
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

   return preg_replace('/-+/', '-', $string);
}

$id = $_SESSION['id'];

$id = clean($id);

if (!$id) {
   header('Location:login.html');
}

include "./models/header.php";

?>

<body style="background-color: white">

   <?php include_once "./models/navbar.php" ?>

   <h3 style="text-align:center">
      <a>Programari user</a>
      <br>
      <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
   </h3>

</body>

<?php


// include_once("db/connection.php");

// $conn = OpenCon();
// mysqli_close($conn);

$tabel = "<table class='bodyp' border=1 style='width:100%;overflow-x:auto;'><tbody id='tbody-header'>";
$tabel .= "<tr style='background-color:black; color:white;'><td align=center>Status</td>";
$tabel .= "<td align=center >Cerere</td>";
$tabel .= "<td align=center >Raspuns</td>";
$tabel .= "</tr>";
$tabel .= "</tbody></table>";
echo $tabel;

?>

<div id='no_pages' class='no_pages'>
</div>

<script src="./JS/fetch.js"></script>
<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function() {

      let id_user = <?php echo json_encode($id); ?>;
      getTableData(id_user, 'all');

      getTableData(id_user, 1)
   });
</script>