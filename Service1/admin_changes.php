<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("db/connection.php");


$chose = "a";
if (isset($_POST['ap'])) {
    $chose = "Aprobat";
} elseif (isset($_POST['res'])) {
    $chose = "Respins";
} else {
    header('Location: programare.php', false, 400);
}

$id = $_POST["id"];
$mesaj = $_POST["mesaj"];

if (strcmp($mesaj, "In asteptare") !== 0) {
    $update1 = "UPDATE cereri SET Raspuns='$mesaj' WHERE ID='$id';";
    $query1 = mysqli_query($conn, $update1);

    $update2 = "UPDATE cereri SET StatusCerere='$chose' WHERE ID='$id';";
    $query1 = mysqli_query($conn, $update2);
} else {
    echo "<script>alert('Introduceti raspunsul');
            window.location.href='cereri_asteptare.php'</script>";
}


if ($chose == 'Aprobat') {

    $slct = "SELECT * FROM programari";
    $query = mysqli_query($conn, $slct);
    $idMax = 0;

    if (mysqli_num_rows($query) > 0) {


        while ($row = mysqli_fetch_assoc($query)) {
            if ($row["ID"] > $idMax)
                $idMax = $row["ID"];
        }
    }

    $idMax = $idMax +1;
    $dataProg = $_POST['data'];
    $oraProg = $_POST['ora'];
    $idCont = $_POST['idCont'];
    
    $insert2 = "INSERT INTO programari(ID,DataProgramarii,OraProgramarii,IdUser) VALUES ('$idMax','$dataProg','$oraProg','$idCont')";
    $query3 = mysqli_query($conn, $insert2);

    echo "<script>alert('Cerere aprobata cu succes');
    window.location.href='cereri_asteptare.php'</script>";

} elseif ($chose == 'Respins') {
    echo "<script>alert('Cerere respinsa cu succes');
    window.location.href='cereri_asteptare.php'</script>";
} else {
    header('Location: programare.php', false, 400);
}
