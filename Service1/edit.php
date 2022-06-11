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

    <link rel="stylesheet" href="css/pagination.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/links.css">

    <link href="css/responsive1.css" type="text/css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width" />


    <script src="./JS/functii.js"></script>

</head>

<body style="background-color: white">

    <?php include_once "./models/navbar.php" ?>

    <h3 id="imgprog" style="text-align:center">
        <a>Pagina principala user</a>
        <br>
        <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
    </h3>
    <hr>
    <div style="text-align:center">
        <button class="sub" onclick="location.href = 'logout.php';">Logout</button>
        <br>
        <button class="sub" onclick="location.href = 'programari.php';">Vizualizari programari</button>
    </div>

    <!-- <p id="date_utilizator"></p> -->
    <script src="./JS/functii.js"></script>
</body>

</html>