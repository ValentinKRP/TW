function checkHours(day, month, year) {
  let hourDates = monthDates[year + "-" + month + "-" + day];
  document.getElementById("time").value = "none";

  for (let i = 8; i <= 17; i++) {
    document.getElementById("time-" + i).classList.remove("hide-hour");
  }

  if (hourDates) {
    for (let i = 0; i < hourDates.length; i++) {
      let currentHour = hourDates[i].split(":")[0];
      document.getElementById("time-" + currentHour).classList.add("hide-hour");
    }
  }
}

function removeClass() {
  var allElements = document.querySelectorAll("#calendar li");
  for (i = 0; i < allElements.length; i++) {
    allElements[i].classList.remove("calendar-selected");
  }
}

function checkDates(month, year) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    monthDates = JSON.parse(this.responseText);
    console.log(monthDates);
    for (const date in monthDates) {
      // MODIFIED TO 10
      if (monthDates[date].length > 2) {
        document.getElementById("li-" + date).classList.add("calendar-full");
      }
    }
  };
  xhttp.open(
    "GET",
    "checkAvailableDate.php?month=" + month + "&year=" + year,
    true
  );
  xhttp.send();
}
