
<?php
include_once("db/connection.php");



$email = $_POST["email"];
$nume = $_POST["nume"];
$prenume = $_POST["prenume"];

$telefon = $_POST["telefon"];
$psw = password_hash($_POST['psw'], PASSWORD_DEFAULT);



$select = "SELECT * from conturi;";
$query = mysqli_query($conn, $select);




$count = mysqli_num_rows($query);

$count = $count + 1;
$id_max = 0;
$ok = 0;
if (mysqli_num_rows($query) > 0) {


    while ($row = mysqli_fetch_assoc($query)) {
        if ($row["Email"] == $email)
            $ok = 1;

        if ($row["ID"] > $id_max)
            $id_max = $row["ID"];
    }
}

$id_max = $id_max + 1;
if ($ok == 0) {

    $insert = "INSERT INTO conturi(ID, Nume, Prenume, Email,Parola, NumarTelefon) VALUES ('$id_max','$nume','$prenume','$email','$psw','$telefon')";

    $query2 = mysqli_query($conn, $insert);

    mysqli_close($conn);

    echo "<script>alert('Contul a fost realizat cu succes!');
   

      window.location.href='home.php';
     
    </script>";
} else
    if ($ok == 1) {
    mysqli_close($conn);

    echo "<script>alert('Email deja utilizat!');
    window.location.href='register.html';
    </script>";
}



?>


