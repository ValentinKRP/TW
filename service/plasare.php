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


$conn= mysqli_connect($servername,$username,$password,$dbname);


 $id = $_POST['id_user'];
 $cerere = $_POST['cerere'];
 $date = $_POST['txtDate'];
 $time = $_POST['time'];
 $id=clean($id);
 
 if (empty($cerere)) {
    $page = file_get_contents("programare.html");
    echo $page;
    echo "<script>alert('Introduceti cererea');</script>";
    
    return;
 }

 if (empty($date)) {
    $page = file_get_contents("programare.html");
    echo $page;
     echo "<script>alert('Introduceti data');</script>";
     return;
  }

  if (empty($time)) {
    $page = file_get_contents("programare.html");
    echo $page;
    echo "<script>alert('Introduceti ora');</script>";
    return;
 }

 
$select="SELECT * from cereri;";
$query = mysqli_query($conn,$select);



   
 $count=mysqli_num_rows($query);
 
 $select2="SELECT * from programari";
 $query2 = mysqli_query($conn,$select2);
 
 
 
    
 $ok=0;
if(mysqli_num_rows($query2) > 0)
{
    
   
    while($row = mysqli_fetch_assoc($query2))
    {    
       
       if($row["OraProgramarii"]==$time && $row["DataProgramarii"]==$date)
           {$page = file_get_contents("programare.html");
            echo $page;
              echo "<script>alert('Ora rezervata')</script>";
              return;
           }
   }
    
}
 
 


$count=$count+1;
$id_max=0;
 
if(mysqli_num_rows($query) > 0)
{
    
   
    while($row = mysqli_fetch_assoc($query))
    {    
         
       if($row["ID"]>$id_max)
           $id_max=$row["ID"];
   }
    
}
$stat="In asteptare";
$raspuns="Niciun raspuns inca";
$id_max=$id_max+1;
     

    $insert="INSERT INTO cereri(ID, TextUtilizator, StatusCerere, DataDorita,OraDorita, IdCont,Raspuns) VALUES ('$id_max','$cerere','$stat','$date','$time','$id','$raspuns')";
    $insert2="INSERT INTO programari(ID,DataProgramarii,OraProgramarii,IdUser) VALUES ('$id_max','$date','$time','$id')";
    $query2=mysqli_query($conn,$insert);
    $query3=mysqli_query($conn,$insert2);
    mysqli_close($conn);
   $page = file_get_contents("programare.html");
   echo $page;
   echo "<script>alert('Cerere inregistrata cu succes!');</script>";
   

?>