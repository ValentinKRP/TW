<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
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
        <a>Pagina principala admin</a>
        <br>
        <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
    </h3>
    <hr>
    <div style="text-align:center">
        <button class="sub" onclick="location.href = 'logout.php';">Logout</button>
        <br>
        <form method="post" action="download_csv.php">
            <button type="submit" class="sub">Download users csv</button>
        </form>
        <a href="piesa_noua.php">
            <button class="sub">Adaugare piesa</button>
        </a>
        <br>
        <a href="stoc.php">
            <button class="sub">Vizualizare stoc</button>
        </a>
        <br>
        <a href="adauga_piesa.php">
            <button class="sub">Cerere furnizor</button>
        </a>
        <br>
        <a href="piese_folosite.php">
            <button class="sub">Piese folosite</button>
        </a>
        <br>
        <a href="cereri_furnizor.php">
            <button class="sub">Cereri furnizori</button>
        </a>
    </div>

    <script src="functii.js"></script>
</body>