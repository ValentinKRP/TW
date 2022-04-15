<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="ServiceOnline";
$conn= mysqli_connect($servername,$username,$password,$dbname);
$page = file_get_contents("edit_clear.html");
echo $page;


$select="SELECT * from cererifurnizori";
$query = mysqli_query($conn,$select);

  
$count=mysqli_num_rows($query);

$tabel="<table border=1 style='width:100%;overflow-x:auto;'>";
$tabel.="<tr style='background-color:black; color:white;'><td align=center>ID</td>";
$tabel.="<td align=center >Nume Furnizor</td>";
$tabel.="<td align=center >Data Cererii</td>";
$tabel.="<td align=center >Cantitate</td>";
$tabel.="<td align=center >Piesa</td>";
$tabel.="</tr>";

 
if(mysqli_num_rows($query) > 0)
{
   
  
   while($row = mysqli_fetch_assoc($query))
   {    
        
    $tabel.="<tr style='background-color:gray'><td align=center>".$row["ID"]."</td><td align=center>".$row["NumeFurnizor"]."</td><td align=center>".$row["DataCererii"]."</td><td align=center>".$row["Cantitate"]."</td><td align=center>".$row["Piesa"]."</td>";
   
  }
  $tabel.="</table>";
   echo $tabel;
}
?>