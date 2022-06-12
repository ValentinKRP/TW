<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/responsive1.css" type="text/css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width" />


    <script src="./JS/functii.js"></script>

</head>

<body style="background-color: white">

    <?php include_once "./models/navbar.php" ?>

    <h3 style="text-align:center">
        <a>Control Panel</a>
        <br>
        <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
    </h3>


    <?php
    include_once("db/connection.php");


    $select = "SELECT * FROM `conturi`";
    $query = mysqli_query($conn, $select);

    $count = mysqli_num_rows($query);

    $tabel = "<form method=post action='panel_changes.php'><table class='panel_table' >";
    $tabel .= "<tr style='background-color:black; color:white;'><td>ID</td>";
    $tabel .= "<td >Nume</td>";
    $tabel .= "<td   >Prenume</td>";
    $tabel .= "<td  >Email</td>";
    $tabel .= "<td >Numar telefon</td>";
    $tabel .= "<td >rol</td>";
    $tabel .= "<td >Sterge</td>";
    $tabel .= "<td >Update</td></tr>";
    if (mysqli_num_rows($query) > 0) {


        while ($row = mysqli_fetch_assoc($query)) {
            $tabel .= "<tr >";

            $tabel .= "<td style='background-color:black;' > <input  type='text' style='width:95%; background-color:black; color:white;' name='id' value='" . $row["ID"] . "' readonly required></td>";
            $tabel .= "<td  style='background-color:black;' ><input class='panelinput' type='text' style='width:95%; background-color:black; color:white;' name='nume' value='" . $row["Nume"] . "'  required></td>";

            $tabel .= "<td  style='background-color:black' ><input class='panelinput' type='text' style='width:95%; background-color:black; color:white;' name='prenume' value='" . $row["Prenume"] . "'  required></td>";
            $tabel .= "<td  style='background-color:black' ><input class='panelinput' type='text' style='width:95%; background-color:black; color:white;' name='email' value='" . $row["Email"] . "'  required></td>";


            $tabel .= "<td  style='background-color:black' ><input class='panelinput' type='text' style='width:95%; background-color:black; color:white;' name='NumarTelefon' value='" . $row["NumarTelefon"] . "' required></td>";

            $tabel .= "<td style='background-color:black' ><input type='text' style='width:95%; background-color:black; color:white;' name='rol' value='" . $row["rol"] . "' required>" . '<input type="hidden" name="idCont" value="' . $row["ID"] . '"/>' . "</td>";






            $tabel .= "<td  style='background-color:black' ><button  value='" . $row['ID'] . "' style='width:95%;' class='subpanel'  name='delete' type='submit'>Sterge</button></td>";
            $tabel .= "<td  style='background-color:black'><button  value='" . $row['ID'] . "' style='width:95%;' class='subpanel'  name='update' type='submit'>UPDATE</button></td>";

            $tabel .= "</tr>";
        }
        $tabel .= "</table>";
        $tabel .= "</form>";
        echo $tabel;
    } else {
        echo "<p style='font-size:20px;' align=center>Nicio inregistrare de confirmat</p>";
    }
    ?>


</body>