<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ServiceOnline";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $nume = $_POST["nume"];

    $select = "SELECT * from piese;";
    $query = mysqli_query($conn, $select);


    $ok = 0;
    $id_max = 0;

    if (mysqli_num_rows($query) > 0) {

        while ($row = mysqli_fetch_assoc($query)) {
            if ($row["NumePiesa"] == $nume)
                $ok = 1;

            if ($row["ID"] > $id_max)
                $id_max = $row["ID"];
        }
    }

    $id_max = $id_max + 1;
    if ($ok == 0) {

        $insert = "INSERT INTO piese(ID, NumePiesa, Numar) VALUES ('$id_max','$nume','$ok')";
        $query2 = mysqli_query($conn, $insert);

        mysqli_close($conn);
        echo "<script>
        alert('Piesa adaugata cu succes!');
        window.location.href='piesa_noua.php';
        </script>";
    } else if ($ok == 1) {
        mysqli_close($conn);
        echo "<script>
        alert('Piesa deja exista!');
        window.location.href='piesa_noua.php';
        </script>";
    }
}


include "header.php";

?>


<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style_log.css">
</head>

<body style="background-color: white">

    <?php include_once "navbar.php" ?>

    <h3 style="text-align:center">
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