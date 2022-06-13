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


if ($chose == 'delete') {


    $select1  = "DELETE FROM cereri WHERE IdCont= '$id' ";
    $query1 = mysqli_query($conn, $select1);
    $select = "DELETE FROM conturi WHERE id= '$id' ";
    $query = mysqli_query($conn, $select);




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
