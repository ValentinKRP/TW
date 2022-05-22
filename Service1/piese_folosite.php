<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "header.php";
?>

<body style="background-color: white">

    <?php include_once "navbar.php" ?>

    <h3 style="text-align:center">
        <a>Piese folosite</a>
        <br>
        <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">
    </h3>

    <?php
    include_once("db/connection.php");

    $conn = OpenCon();
    

    $select = "SELECT * from piese";
    $query = mysqli_query($conn, $select);


    $form = '<form method="post" action="scade_piese.php">';


    $form .= '  <div align=center class="container">';
    $form .= '        <label style="display:inline-block; text-align: right; width:100px;" for="tip"><b>Alege tipul</b></label>';
    $form .= '    <select style="width: 30%;" name="tip" id="tip">';


    if (mysqli_num_rows($query) > 0) {


        while ($row = mysqli_fetch_assoc($query)) {

            $form .= ' <option value="' . $row["NumePiesa"] . '">' . $row["NumePiesa"] . '</option>';
        }
    }
    $form .= '  </select>';
    $form .= '  <br></br>';
    $form .= '  <label style="display:inline-block; text-align: right; width:100px;" for="cantitate"><b>Cantitate</b></label>';
    $form .= '     <input type="text" placeholder="Introduceti cantitatea" name="cantitate" required>';
    $form .= '    <br></br>';

    $form .= '    <button  class="sub" type="submit">Scade</button>';


    $form .= '   </div>';


    $form .= '  </form>';

    mysqli_close($conn);

    echo $form;
    ?>

</body>