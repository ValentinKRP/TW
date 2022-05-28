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

include "./models/header.php";
?>

<head>
  <link rel="stylesheet" href="css/style_log.css">
  <link href="css/calend.css" type="text/css" rel="stylesheet" />
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
      <p style="font-size:20px">Introduceti motivul programarii:</p>
      <textarea id="cerere" name="cerere" maxlength="2000" rows="5" cols="60" required></textarea>
      <br>
      <?php
      include 'calendar.php';

      $calendar = new Calendar();

      echo $calendar->show();
      ?>
      <label>Data dorita:</label><input type="hidden" id="txtDate" name="txtDate">

      <br>
      <label for="time">Ora: </label>
      <select name="time" id="time">
        <option value="none" selected disabled>Selectati ora</option>
        <?php
        for ($i = 8; $i <= 18; $i++) {
          // TO DO: daca ora e ocupata nu o afisez
          echo "<option id='time-" . $i . "' value=" . $i . ">" . $i . ":00" . "</option>";
        }
        ?>
      </select>

      <br>
      <label>Imagine: </label><input type="file" id="myFile" name="filename" id="filename">
      <p id="iflogged">
        <?php
        if (isset($_SESSION['id'])) {
          echo "<input id='id_user' name='id_user' type='hidden' value=" . $_SESSION["id"] . " >";
          echo "<button id='sub' class='sub' type='submit'>Trimite cererea</button>";
        } else {
          echo "<p style='color:red; font-size:20px;'>Pentru a trimite o cerere trebuie sa fiti logat</p>";
        }
        ?>

      </p>
    </div>
  </form>

  <script>
    let monthDates;

    let currentDate = new Date();
    let month = <?= json_encode($month) ?>;
    let year = <?= json_encode($year) ?>;
    console.log(month);
    let monthJSON = [
      31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
    ]


    for (let i = 1; i <= monthJSON[parseInt(parseInt(month, 10) - 1, 10)]; i++) {

      let currentId = "li-" + year + '-' + month + '-';
      currentId += (i < 10) ? '0' + i : i;

      let tempDate = new Date(year + '-' + month + '-' + i);

      if (currentDate - tempDate > 0) {
        document.getElementById(currentId).classList.add('calendar-disabled');
      } else {
        document.getElementById(currentId).addEventListener("click", function(e) {
          removeClass();
          this.classList.add("calendar-selected");
          let day = this.innerHTML < 10 ? '0' + this.innerHTML : this.innerHTML;
          let hiddenDate = year + '-' + month + '-' + day;
          document.getElementById('txtDate').value = hiddenDate;

          checkHours(day, month, year);
        });
      }
    }

    function checkHours(day, month, year) {
      let hourDates = monthDates[year + '-' + month + '-' + day];
      document.getElementById('time').value = 'none';

      for (let i = 8; i <= 18; i++) {
        document.getElementById('time-' + i).classList.remove('hide-hour');
      }

      if (hourDates) {
        console.log(hourDates);

        for (let i = 0; i < hourDates.length; i++) {
          let currentHour = hourDates[i].split(':')[0];
          document.getElementById('time-' + currentHour).classList.add('hide-hour');
        }
      }
    }

    function removeClass() {
      var allElements = document.querySelectorAll("#calendar li");
      for (i = 0; i < allElements.length; i++) {
        allElements[i].classList.remove('calendar-selected');
      }
    }

    checkDates(month, year);


    function checkDates(month, year) {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        monthDates = JSON.parse(this.responseText);
        console.log(monthDates);
        for (const date in monthDates) {
          // MODIFIED TO 10
          if (monthDates[date].length > 9) {
            document.getElementById('li-' + date).classList.add('calendar-full');
          }
        }

      }
      xhttp.open("GET", "checkAvailableDate.php?month=" + month + "&year=" + year, true);
      xhttp.send();
    }
  </script>


</body>

</html>