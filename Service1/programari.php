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

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Service</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
   <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

   <link rel="stylesheet" href="css/pagination.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/links.css">
   <link href="css/responsive1.css" type="text/css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width" />


   <script src="./JS/functii.js"></script>

</head>

<body style="background-color: white">

   <?php include_once "./models/navbar.php" ?>

   <h3 id="imgprog" style="text-align:center">
      <a>Programari user</a>
      <br>
      <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
   </h3>
   <table class='bodyp' style='overflow-x:auto; border: 1px solid;'>
      <tbody id='tbody-header'>
         <tr style='background-color:black; color:white;'>
            <td style='text-align: center;'>Status</td>
            <td style='text-align: center;'>Cerere</td>
            <td style='text-align: center;'>Ora</td>
            <td style='text-align: center;'>Data</td>
            <td style='text-align: center;'>Raspuns</td>

         </tr>
      </tbody>
   </table>
   <div id='no_pages' class='no_pages'>
   </div>
   <script src="./JS/fetch.js"></script>
   <script>
      document.addEventListener("DOMContentLoaded", function() {

         let id_user = <?php echo json_encode($id); ?>;
         getTableData(id_user, 'all');

         getTableData(id_user, 1)
      });
   </script>
</body>

<?php


// include_once("db/connection.php");

// 
// mysqli_close($conn);




?>