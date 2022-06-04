<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "./models/header.php";
?>



<body style="background-color: white">

    <?php include_once "./models/navbar.php" ?>

    <h3 style="text-align:center">
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

    <p id="date_utilizator"></p>
    <script src="./JS/functii.js"></script>
</body>

</html>