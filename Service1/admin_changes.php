<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once("db/connection.php");


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
            window.location.href='admin.php'</script>";
}
$select = "SELECT * from cereri where StatusCerere='In asteptare'";
$query = mysqli_query($conn, $select);


$count = mysqli_num_rows($query);

if ($chose == 'Aprobat') {
    echo "<script>alert('Cerere aprobata cu succes');
    window.location.href='admin.php'</script>";
} elseif ($chose == 'Respins') {
    echo "<script>alert('Cerere respinsa cu succes');
    window.location.href='admin.php'</script>";
} else {
    header('Location: programare.php', false, 400);
}
