function getTableData(id_user, no_rows) {
  fetch("./programari_data.php?id_user=" + id_user + "&no_rows=" + no_rows)
    .then((response) => response.json())
    .then((data) => {
      if (no_rows === "all") {
        let noPagesHTML = document.getElementById("no_pages");
        let noPages = parseInt(data.length / 5) + (data.length % 5 > 0 ? 1 : 0);
        let ulPagination = document.createElement("ul");

        for (let i = 1; i <= noPages; i++) {
          const liPagination = document.createElement("li");
          liPagination.setAttribute("id", "liPage-" + i);
          liPagination.setAttribute(
            "class",
            i == 1 ? "active liPages" : "liPages"
          );
          liPagination.innerHTML = i;
          liPagination.setAttribute(
            "onclick",
            "getTableData(" + id_user + ", " + i + ")"
          );
          ulPagination.appendChild(liPagination);
        }
        ulPagination.setAttribute("class", "ulpag");

        noPagesHTML.appendChild(ulPagination);
      } else {
        let liPages = document.getElementsByClassName("liPages");

        for (let i = 0; i < liPages.length; i++) {
          liPages[i].classList.contains("active")
            ? liPages[i].classList.remove("active")
            : "";
        }

        if (document.getElementById("liPage-" + no_rows))
          document.getElementById("liPage-" + no_rows).classList.add("active");

        let table = document.querySelector(".bodyp");
        let tbodies = table.getElementsByTagName("tbody");

        for (let i = 0; i < tbodies.length; i++) {
          if (!tbodies[i].getAttribute("id")) table.removeChild(tbodies[i]);
        }

        let output = "";
        console.log(data);
        for (let i in data) {
          output += `<tr style='background-color:gray'>
                <td align=center>${data[i].StatusCerere}</td>
                <td align=center>${data[i].TextUtilizator}</td>
                <td align=center>${data[i].OraDorita}</td>
                <td align=center>${data[i].DataDorita}</td>           
                <td align=center>${data[i].Raspuns}.</td>
                </tr>`;
        }
        document.querySelector(".bodyp").innerHTML += output;
      }
    })
    .catch(function (err) {
      console.log("Fetch Error :-S", err);
    });
}
