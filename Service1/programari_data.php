<?php
function clean($string)
{
    $string = str_replace(' ', '-', $string);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    return preg_replace('/-+/', '-', $string);
}


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_user'])) {

    $id = $_GET['id_user'];
    $id = clean($id);

    include_once("db/connection.php");



    if (isset($_GET['no_rows']) && $_GET['no_rows'] != 'all') {
        $startRows = ($_GET['no_rows'] - 1) * 5;
        $stopRows = $_GET['no_rows'] * 5;
        $select = "SELECT * FROM cereri where IDcont='$id' LIMIT 5 OFFSET " . $startRows . "";
    } else {
        $select = "SELECT * FROM cereri where IDcont='$id'";
    }

    $query = mysqli_query($conn, $select);
    $count = mysqli_num_rows($query);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

    echo json_encode($result);
}
