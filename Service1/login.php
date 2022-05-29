
<?php
include_once("db/connection.php");



if (isset($_POST["email"]) && isset($_POST["psw"])) {

  $email = $_POST["email"];

  $psw = $_POST["psw"];


  $select = "SELECT * from conturi where email='$email'";
  $query = mysqli_query($conn, $select);


  $qq = mysqli_num_rows($query);
  $row = mysqli_fetch_assoc($query);
  if (isset($row) && $row["Parola"] && $row["Parola"] == $psw) {
    mysqli_close($conn);
    session_start();

    $_SESSION["id"] = $row["ID"];
    $_SESSION["email"] = $row["Email"];
    $_SESSION["rol"] = $row["rol"] ? 'admin' : 'user';

    var_export($_SESSION);
    header("Location:home.php");
  } else {
    $login_page = file_get_contents("login.html");
    echo $login_page;
    echo "<script>alert('Cont inexistent!');</script>";
  }
}


?>


