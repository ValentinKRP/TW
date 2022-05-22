<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ServiceOnline";
$tip = $_POST["tip"];
$cantitate = $_POST["cantitate"];
$furnizor = $_POST["furnizor"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
$select = "SELECT * from piese where NumePiesa='$tip'";
$query = mysqli_query($conn, $select);
$sum = 0;
if (mysqli_num_rows($query) > 0) {


    while ($row = mysqli_fetch_assoc($query)) {

        $sum = (int)$row["Numar"] + $cantitate;
    }
}
$update = "UPDATE piese SET Numar=$sum where NumePiesa='$tip'";
$query2 = mysqli_query($conn, $update);

$select = "SELECT * from piese";
$query = mysqli_query($conn, $select);


$count = mysqli_num_rows($query);

$select = "SELECT * from cererifurnizori";
$query = mysqli_query($conn, $select);

$count = mysqli_num_rows($query);

$count = $count + 1;
$id_max = 0;
$ok = 0;
if (mysqli_num_rows($query) > 0) {


    while ($row = mysqli_fetch_assoc($query)) {

        if ($row["ID"] > $id_max)
            $id_max = $row["ID"];
    }
}

$id_max = $id_max + 1;

$date = date("d m Y");

$insert = "INSERT INTO cererifurnizori(ID, NumeFurnizor,DataCererii, Cantitate,Piesa) VALUES ('$id_max','$furnizor','$date','$cantitate','$tip')";
$query2 = mysqli_query($conn, $insert);

mysqli_close($conn);

echo "<script>
      alert('Cerere inregistrata cu succes!');
      window.location.href='adauga_piesa.php';
      </script>";
