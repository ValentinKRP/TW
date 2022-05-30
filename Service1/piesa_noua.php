<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once("db/connection.php");

    

    $nume = $_POST["nume"];
    
    $query = "SELECT * FROM piese WHERE NumePiesa ='$nume';";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
        echo "<script>
        alert('Piesa deja exista!');
        window.location.href='piesa_noua.php';
        </script>";
    }
    else {
        $query = "SELECT MAX(ID) from piese;";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($result);
        $id_max = $row[0] +1;

        $nr = 0;
        $query = "INSERT INTO piese(ID, NumePiesa, Numar) VALUES ('$id_max','$nume','$nr')";
        $insert = mysqli_query($conn, $query);
    
        mysqli_close($conn);
        echo "<script>
        alert('Piesa adaugata cu succes!');
        window.location.href='piesa_noua.php';
        </script>";
    }

}


include "./models/header.php";

?>


<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style_log.css">
</head>

<body style="background-color: white">

    <?php include_once "./models/navbar.php" ?>

    <h3 style="text-align:center">
      <a>Adaugare Piesa Noua</a>
      <br>
      <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
   </h3>

    <form method="post" action="piesa_noua.php">
        <div style="text-align:center" class="container">
            <label style='display:inline-block; text-align: right; width:100px;' for="nume"><b>Nume piesa</b></label>
            <input type="text" placeholder="Introduceti numele piesei" name="nume" id="nume" required>
            <hr>
            <button type="submit" class="sub">Adauga</button>
        </div>
    </form>
</body>