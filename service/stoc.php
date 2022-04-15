<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="ServiceOnline";


$conn= mysqli_connect($servername,$username,$password,$dbname);
$select="SELECT * from piese";
$query = mysqli_query($conn,$select);



mysqli_close($conn);
$page = file_get_contents("edit_clear.html");
echo $page;

$tabel="<table border=1 style='width:100%;'>";
$tabel.="<tr style='background-color:black; color:white;'><td align=center>ID</td>";
$tabel.="<td align=center >Nume</td>";
$tabel.="<td align=center >Bucati</td>";
 
$tabel.="</tr>";

 
if(mysqli_num_rows($query) > 0)
{
   
  
   while($row = mysqli_fetch_assoc($query))
   {    
        
    $tabel.="<tr style='background-color:gray'><td align=center>".$row["ID"]."</td><td align=center>".$row["NumePiesa"]."</td><td align=center>".$row["Numar"]."</td>";
   
  }
  $tabel.="</table>";
   echo $tabel;
}
?>