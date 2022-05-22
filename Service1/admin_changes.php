<?php

include_once("db/connection.php");

$chose = "a";
$conn = OpenCon();

if (isset($_POST['ap'])) {
    $chose = "Aprobat";
} elseif (isset($_POST['res'])) {
    $chose = "Respins";
}

$id = $_POST["id"];
$mesaj = $_POST["mesaj"];
$page = file_get_contents("edit_clear.html");
echo $page;
if (strcmp($mesaj, "In asteptare") !== 0) {
    $update1 = "UPDATE cereri SET Raspuns='$mesaj' WHERE ID='$id';";
    $query1 = mysqli_query($conn, $update1);

    $update2 = "UPDATE cereri SET StatusCerere='$chose' WHERE ID='$id';";
    $query1 = mysqli_query($conn, $update2);
} else {
    echo "<script>alert('Introduceti raspunsul')</script>";
}
$select = "SELECT * from cereri where StatusCerere='In asteptare'";
$query = mysqli_query($conn, $select);


$count = mysqli_num_rows($query);


$tabel = "<table border=1 style='width:100%; table-layout: fixed; overflow-x:auto;'>";
$tabel .= "<tr style='background-color:black; color:white;'><td align=center>Cerere</td>";
$tabel .= "<td align=center  >ID</td>";
$tabel .= "<td align=center >Data dorita</td>";
$tabel .= "<td align=center>Ora dorita</td>";
$tabel .= "<td align=center>Formuleaza raspuns</td>";
$tabel .= "<td align=center>Aproba</td>";
$tabel .= "<td align=center>Respinge</td></tr>";

if (mysqli_num_rows($query) > 0) {


    while ($row = mysqli_fetch_assoc($query)) {
        $tabel .= "<tr >";
        $var = $row["TextUtilizator"];
        $delimiter = ' ';
        $words = explode($delimiter, $var);
        $concat = "";
        foreach ($words as $word) {
            $concat .= $word . ".";
        }
        $tabel .= "<td style='background-color:black;' align=center> <button  style='width:95%; height:100%;' class='sub' onclick=" . "alert('" . "$concat" . "')" . " ; >Arata cererea</button></td>";

        $tabel .= "<form method=post action='admin_changes.php'>";
        $tabel .= "<td style='background-color:black;' align=center><input type='text' style='width:95%; background-color:black; color:white;' name='id' value='" . $row["ID"] . "' readonly required></td>";

        $tabel .= "<td  style='background-color:black' align=center><input type='text' style='width:95%; background-color:black; color:white;' name='data' value='" . $row["DataDorita"] . "' readonly required></td>";

        $tabel .= "<td style='background-color:black' align=center><input type='text' style='width:95%; background-color:black; color:white;' name='ora' value='" . $row["OraDorita"] . "' readonly required></td>";

        $tabel .= "<td style='background-color:black' align=center><input type='text' style='width:95%; background-color:black; color:white;' name='mesaj' value='" . $row["StatusCerere"] . "' required></td>";






        $tabel .= "<td  style='background-color:black' align=center><button  value='" . $row['ID'] . "'style='width:95%;' class='sub' name='ap' type='submit'>Aproba</button></td>";
        $tabel .= "<td  style='background-color:black' align=center><button  value='" . $row['ID'] . "'style='width:95%;' class='sub' name='res' type='submit'>Respinge</button></td>";
        $tabel .= "</form>";
        $tabel .= "</tr>";
    }
    $tabel .= "</table>";
    echo $tabel;
} else {
    echo "<p style='font-size:20px;' align=center>Nicio inregistrare de confirmat</p>";
}
