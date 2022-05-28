<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "./models/header.php";
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_log.css">
    <link rel="stylesheet" href="css/links.css">

    <style>
        body {
            background-color: white;
        }
    </style>
</head>

<body>
    <?php include_once "./models/navbar.php" ?>

    <h2 style="text-align:center">
        <a>Program</a>
        <br>
        <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">

    </h2>


    <h3 style="text-align:center">
        <br>
        <a>Luni-Vineri: 08:00 - 23:00</a>
        <br>
        <br>
        <a>Sambata: Liber </a>
        <br>
        <br>
        <a>Duminica: Liber </a>
        <br>
        <br>
        <a href="./ScholaryHTML/ghid.html">Ghid </a>
        <br>
        <br>
        <a href="./ScholaryHTML/documentatie.html">Documentatie</a>
        <br>
        <br>
        Adresa:Strada Mihai Eminescu Nr.18,Bucuresti
    </h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2848.3241290984197!2d26.097790815167144!3d44.447024479102026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b1ff4d0c6e46dd%3A0x253f4973c7866cad!2sStrada%20Mihai%20Eminescu%2018%2C%20Bucure%C8%99ti%20030167!5e0!3m2!1sro!2sro!4v1618213495897!5m2!1sro!2sro" height="300" style="border:0; margin-left:20px;width:100%;" allowfullscreen="" loading="lazy"></iframe>

    <script src="./JS/functii.js"></script>
</body>

</html>