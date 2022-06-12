<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("db/connection.php");


$chose = "a";
if (isset($_POST['delete'])) {
    $chose = "delete";
} elseif (isset($_POST['update'])) {
    $chose = "update";
} else {
    header('Location: control_panel.php', false, 400);
}

$id = $_POST["id"];


// if (strcmp($mesaj, "In asteptare") !== 0) {
//     $update1 = "UPDATE cereri SET Raspuns='$mesaj' WHERE ID='$id';";
//     $query1 = mysqli_query($conn, $update1);

//     $update2 = "UPDATE cereri SET StatusCerere='$chose' WHERE ID='$id';";
//     $query1 = mysqli_query($conn, $update2);
// } else {
//     echo "<script>alert('Introduceti raspunsul');
//             window.location.href='cereri_asteptare.php'</script>";
// }


if ($chose == 'delete') {

    $slct = "DELETE FROM conturi WHERE id= '$id'";
    $query = mysqli_query($conn, $slct);
    $idMax = 0;

    $select2 = "SELECT * FROM conturi";
    $query2 = mysqli_query($conn, $select2);

    if (mysqli_num_rows($query2) > 0) {


        while ($row = mysqli_fetch_assoc($query2)) {
            if ($row["ID"] > $idMax)
                $idMax = $row["ID"];
        }
    }

    $idMax = $idMax + 1;

    // $insert2 = "INSERT INTO programari(ID,DataProgramarii,OraProgramarii,IdUser) VALUES ('$idMax','$dataProg','$oraProg','$idCont')";
    // $query3 = mysqli_query($conn, $insert2);

    echo "<script>alert('Utilizatorul a fost sters!');
    window.location.href='control_panel.php'</script>";
} elseif ($chose == 'update') {
    $nume = $_POST["nume"];
    $prenume = $_POST["prenume"];
    $email = $_POST["email"];
    $NumarTelefon = $_POST["NumarTelefon"];
    $rol = $_POST["rol"];

    $update1 = "UPDATE conturi SET Nume='$nume', Prenume='$prenume', Email='$email', NumarTelefon='$NumarTelefon', rol='$rol' WHERE id='$id'";
    $query1 = mysqli_query($conn, $update1);

    echo "<script>alert('Datele utilizatorului au fost updatate');
    window.location.href='control_panel.php'</script>";
} else {
    header('Location: control_panel', false, 400);
}
