<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="ServiceOnline";


$conn= mysqli_connect($servername,$username,$password,$dbname);


$nume=$_POST["nume"];

$select="SELECT * from piese;";
$query = mysqli_query($conn,$select);


$ok=0;

if(mysqli_num_rows($query) > 0)
 {
     
    while($row = mysqli_fetch_assoc($query))
    {    
        if($row["NumePiesa"]==$nume)
           $ok=1;
    
       if($row["ID"]>$id_max)
           $id_max=$row["ID"];
   }
    
}
     
     

$id_max=$id_max+1;
if($ok==0) {
 
$insert="INSERT INTO piese(ID, NumePiesa, Numar) VALUES ('$id_max','$nume','$ok')";
$query2=mysqli_query($conn,$insert);
      
    mysqli_close($conn);
   $register_page = file_get_contents("piesa_noua.html");
   echo $register_page;

}
else 
if($ok==1)
   {
       mysqli_close($conn);
       $register_page = file_get_contents("piesa_noua.html");
       echo $register_page;
       echo "<script>alert('Piesa deja exista!');</script>";
   }
?>