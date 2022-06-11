<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    // session isn't started
    session_start();
}

?>


<div class="topnav" id="myTopnav">

    <a href="home.php"><i>Acasa</i></a>

    <?php
    if (!isset($_SESSION['id']) || (isset($_SESSION['id']) && $_SESSION['rol'] === 'user'))
        echo "<a href='programare.php'><i>Programeaza</i></a>";
    ?>

    <?php
    if (!isset($_SESSION['id']))
        echo "<a href='register.html'><i>Inregistrare</i></a>";
    ?>
    <a href="program.php"><i>Program</i></a>
    <div class=reg>
        <i id="logare">
            <?php
            if (isset($_SESSION['id'])) {
                $email = $_SESSION['email'] ? $_SESSION['email'] : 'Missing Email';

                if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
                    echo "<a href='admin_meniu.php'>" . $email . "</a>";
                } else {
                    echo "<a href='edit.php'>" . $email . "</a>";
                }
            } else {
                echo "<a href='login.html'>Logare</a>";
            }
            ?>

        </i>
    </div>


    <!-- <a href=" javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a> -->
</div>