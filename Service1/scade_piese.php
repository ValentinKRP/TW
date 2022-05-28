<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once("db/connection.php");

$conn = OpenCon();
$tip = $_POST["tip"];
$cantitate = $_POST["cantitate"];

$select = "SELECT * from piese where NumePiesa='$tip'";
$query = mysqli_query($conn, $select);
$sum = 0;
if (mysqli_num_rows($query) > 0) {


    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['Numar'] > 0) {
            $sum = (int)$row["Numar"] - $cantitate;
            $update = "UPDATE piese SET Numar=$sum where NumePiesa='$tip'";
            $query2 = mysqli_query($conn, $update);
        } else
            echo "<script>alert('Nu exista stoc pentru aceasta piesa!');
            window.location.href='piese_folosite.php';</script>";
    }
}


$select = "SELECT * from piese";
$query = mysqli_query($conn, $select);


$count = mysqli_num_rows($query);


mysqli_close($conn);

echo "<script>
      alert('Stocul piesei a fost modificat cu succes!');
      window.location.href='piese_folosite.php';
      </script>";
