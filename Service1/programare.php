<?php

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_GET) && isset($_GET['month'])) {
  $month = $_GET['month'];
} else {
  $month = date('m');
}

if (isset($_GET) && isset($_GET['year'])) {
  $year = $_GET['year'];
} else {
  $year = date('Y');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Service</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/calendar.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="css/responsive1.css">
  <meta name="viewport" content="width=device-width" />



  <script src="./JS/functii.js"></script>

</head>

<body style="background-color: white;">

  <?php include_once "./models/navbar.php" ?>

  <h2 style="text-align:center">
    <a>Creeaza o programare</a>
    <br>
    <img alt="?" src="image/logo.png" style="border-radius: 50%;" width="160" height="160">

  </h2>
  <form method=post action='plasare.php' enctype="multipart/form-data">
    <div style="text-align:center" class="container">

      <label>Data dorita:</label><input type="hidden" id="txtDate" name="txtDate">
      <?php
      include_once 'calendar.php';
      ?>


      <br>
      <label for="time">Ora: </label>
      <select name="time" id="time">
        <option value="none" selected disabled>Selectati ora</option>
        <?php
        for ($i = 8; $i <= 17; $i++) {

          echo "<option id='time-" . $i . "' value=" . $i . ">" . $i . ":00" . "</option>";
        }
        ?>
      </select>
      <p id="motiv" style="font-size:20px">Introduceti motivul programarii:</p>
      <textarea id="cerere" name="cerere" maxlength="2000" rows="5" cols="60" required></textarea>
      <br>
      <br>
      <label>Imagine: </label><input id="loginput" type="file" name="filename">
      <div id="iflogged">
        <?php
        if (isset($_SESSION['id'])) {
          echo "<input id='id_user' name='id_user' type='hidden' value=" . $_SESSION["id"] . " >";
          echo "<button id='sub' class='sub' type='submit'>Trimite cererea</button>";
        } else {
          echo "<p style='color:red; font-size:20px;'>Pentru a trimite o cerere trebuie sa fiti logat</p>";
        }
        ?>

      </div>
    </div>
  </form>
  <script src="./JS/calendar.js"></script>
  <script>
    let monthDates;

    let currentDate = new Date();
    let month = <?= json_encode($month) ?>;
    let year = <?= json_encode($year) ?>;

    let monthJSON = [
      31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
    ]


    for (let i = 1; i <= monthJSON[parseInt(parseInt(month, 10) - 1, 10)]; i++) {

      let currentId = "li-" + year + '-' + month + '-';
      currentId += i;

      let tempDate = new Date(year + '-' + month + '-' + i);

      if (currentDate - tempDate > 0) {
        document.getElementById(currentId).classList.add('calendar-disabled');
      } else {
        document.getElementById(currentId).addEventListener("click", function(e) {
          removeClass();
          this.classList.add("calendar-selected");
          let day = this.innerHTML;
          let hiddenDate = year + '-' + month + '-' + day;
          document.getElementById('txtDate').value = hiddenDate;

          checkHours(day, month, year);
        });
      }

      let buildedDate = new Date(tempDate);
      if (buildedDate.getDay() == 6 || buildedDate.getDay() == 0) {
        document.getElementById(currentId).classList.add('calendar-disabled');
      }
    }


    checkDates(month, year);
  </script>


</body>

</html>