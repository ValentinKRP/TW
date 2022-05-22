<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
   session_start();
}

function clean($string)
{
   $string = str_replace(' ', '-', $string);
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

   return preg_replace('/-+/', '-', $string);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ServiceOnline";


$conn = mysqli_connect($servername, $username, $password, $dbname);

$id = $_POST['id_user'];


if (isset($_FILES['filename'])) {
   $imagename = $_FILES["filename"]["name"];
   $check = mime_content_type($_FILES["filename"]["tmp_name"]);

   // if ($check != 'image/png' && $check != 'image/jpg') {
   //    $page = file_get_contents("programare.html");
   //    echo $page;
   //    echo "<script>alert('Format fisier gresit');</script>";
   //    return;
   // }

   // $target_dir = "uploads/" . trim($id, "\"");

   // if (!file_exists($target_dir)) {
   //    mkdir($target_dir, 0777, true);
   // }


   // if (move_uploaded_file(basename($_FILES["filename"]["tmp_name"]), $target_dir)) {
   //    echo "The file has been uploaded.";
   // } else {
   //    echo "Sorry, there was an error uploading your file.";
   //    var_export($_FILES["filename"]);
   // }
}


$cerere = $_POST['cerere'];
$date = $_POST['txtDate'];
$time = $_POST['time'] . ':00';
$id = clean($id);
if (empty($cerere)) {
   echo "<script>alert('Introduceti cererea');
   window.location.href='programare.php';
   </script>";
}

if (empty($date)) {
   echo "<script>alert('Introduceti o data valida');
   window.location.href='programare.php';
   </script>";
}

if (empty($time)) {
   echo "<script>alert('Introduceti o data valida');
   window.location.href='programare.php';
   </script>";
}

$select = "SELECT * from cereri;";
$query = mysqli_query($conn, $select);


$count = mysqli_num_rows($query);

$select2 = "SELECT * from programari";
$query2 = mysqli_query($conn, $select2);


$ok = 0;
$app = "Aprobat";
if (mysqli_num_rows($query2) > 0) {


   while ($row = mysqli_fetch_assoc($query2)) {

      if ($row["OraProgramarii"] == $time && $row["DataProgramarii"] == $date) {
         $select3 = "SELECT * from cereri where DataDorita='$date' and OraDorita='$time';";
         $query3 = mysqli_query($conn, $select3);
         if (mysqli_num_rows($query3) > 0) {


            while ($row2 = mysqli_fetch_assoc($query3)) {
               if ($row2["StatusCerere"] == $app) {
                  echo "<script>alert('Ora rezervata');
                  window.location.href='programare.php';
                  </script>";
               }
            }
         }
      }
   }
}




$count = $count + 1;
$id_max = 0;

if (mysqli_num_rows($query) > 0) {


   while ($row = mysqli_fetch_assoc($query)) {

      if ($row["ID"] > $id_max)
         $id_max = $row["ID"];
   }
}
$stat = "In asteptare";
$raspuns = "Niciun raspuns inca";
$id_max = $id_max + 1;


$insert = "INSERT INTO cereri(ID, TextUtilizator, StatusCerere, DataDorita,OraDorita, IdCont,Raspuns, imagename) VALUES ('$id_max','$cerere','$stat','$date','$time','$id','$raspuns', '$imagename')";
$insert2 = "INSERT INTO programari(ID,DataProgramarii,OraProgramarii,IdUser) VALUES ('$id_max','$date','$time','$id')";
$query2 = mysqli_query($conn, $insert);
$query3 = mysqli_query($conn, $insert2);
mysqli_close($conn);
echo "<script>
      alert('Cerere inregistrata cu succes!');
      window.location.href='programare.php';
      </script>";
