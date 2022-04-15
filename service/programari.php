<?php
   function clean($string) {
    $string = str_replace(' ', '-', $string);  
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);  
 
    return preg_replace('/-+/', '-', $string);  
 }
$servername = "localhost";
$username="root";
$password="";
$dbname="ServiceOnline";

$id = $_POST['id_user'];
 
$id=clean($id);

$conn= mysqli_connect($servername,$username,$password,$dbname);

$select="SELECT * FROM cereri where IDcont='$id'";
$query = mysqli_query($conn,$select); 
$count=mysqli_num_rows($query);
  
mysqli_close($conn);
$page = file_get_contents("edit_clear.html");
echo $page;

$tabel="<table border=1 style='width:100%;overflow-x:auto;'>";
$tabel.="<tr style='background-color:black; color:white;'><td align=center>Status</td>";
$tabel.="<td align=center >Cerere</td>";
$tabel.="<td align=center >Raspuns</td>";
 
$tabel.="</tr>";

 
if(mysqli_num_rows($query) > 0)
{
   
  
   while($row = mysqli_fetch_assoc($query))
   {    
        
    $tabel.="<tr style='background-color:gray'><td align=center>".$row["StatusCerere"]."</td><td align=center>".$row["TextUtilizator"]."</td><td align=center>".$row["Raspuns"]."</td>";
   
  }
  $tabel.="</table>";
   echo $tabel;
}
?>