<?php
function clean($string)
{
   $string = str_replace(' ', '-', $string);
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

   return preg_replace('/-+/', '-', $string);
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ServiceOnline";

$id = $_POST['id_user'];



$id = clean($id);

$conn = mysqli_connect($servername, $username, $password, $dbname);



mysqli_close($conn);
$page = file_get_contents("edit_clear.html");
echo $page;

$tabel = "<table class='bodyp' border=1 style='width:100%;overflow-x:auto;'><tbody id='tbody-header'>";
$tabel .= "<tr style='background-color:black; color:white;'><td align=center>Status</td>";
$tabel .= "<td align=center >Cerere</td>";
$tabel .= "<td align=center >Raspuns</td>";
$tabel .= "</tr>";
$tabel .= "</tbody></table>";
echo $tabel;

?>

<div id='no_pages' class='no_pages'>
</div>


<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function() {

      let id_user = <?php echo json_encode($id); ?>;
      getTableData(id_user, 'all');

      getTableData(id_user, 1)
   });
</script>