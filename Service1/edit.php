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
        <a>Pagina principala user</a>
        <br>
        <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
    </h3>
    <hr>
    <div style="text-align:center">
        <button class="sub" onclick="location.href = 'logout.php';">Logout</button>
        <br>
        <button class="sub">
            <a href="programari.php" style="text-decoration: none">Vizualizare programari</a>
        </button>
    </div>

    <p id="date_utilizator"></p>
    <script src="functii.js"></script>
</body>

</html>