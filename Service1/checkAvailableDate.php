<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['month']) && isset($_GET['year'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ServiceOnline";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $month = $_GET['month'];
    $year = $_GET['year'];

    $wantedDate = $year . "-" . $month . "-";

    $select = "SELECT DataProgramarii, OraProgramarii from programari WHERE DataProgramarii LIKE '$wantedDate%'";

    $query = mysqli_query($conn, $select);


    $count = mysqli_num_rows($query);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

    $groupedDates = [];
    foreach ($result as $r) {
        if (!isset($groupedDates[$r['DataProgramarii']]))
            $groupedDates[$r['DataProgramarii']] = [];

        array_push($groupedDates[$r['DataProgramarii']], $r['OraProgramarii']);
    }

    echo json_encode($groupedDates);
} else {
    header('Location: programare.php', false, 400);
    exit;
}
