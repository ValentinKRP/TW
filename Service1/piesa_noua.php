<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="ServiceOnline";


$conn= mysqli_connect($servername,$username,$password,$dbname);


$nume=$_POST["nume"];

$select="SELECT * from piese;";
$query = mysqli_query($conn,$select);



   
$count=mysqli_num_rows($query);
    
$count=$count+1;
$id_max=0;
$ok=0;
 if(mysqli_num_rows($query) > 0)
 {
     
    
     while($row = mysqli_fetch_assoc($query))
     {    
         
        if($row["ID"]>$id_max)
            $id_max=$row["ID"];
    }
     
 }

$id_max=$id_max+1;
 
$insert="INSERT INTO piese(ID, NumePiesa, Numar) VALUES ('$id_max','$nume','$ok')";
$query2=mysqli_query($conn,$insert);
      
    mysqli_close($conn);
   $register_page = file_get_contents("piesa_noua.html");
   echo $register_page;
?>