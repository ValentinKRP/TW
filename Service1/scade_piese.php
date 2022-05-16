<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="ServiceOnline";
$tip=$_POST["tip"];
$cantitate=$_POST["cantitate"];
 
$conn= mysqli_connect($servername,$username,$password,$dbname);
$select="SELECT * from piese where NumePiesa='$tip'";
$query = mysqli_query($conn,$select);
$sum=0;
if(mysqli_num_rows($query) > 0)
{
    
   
    while($row = mysqli_fetch_assoc($query))
    {    
        if($row['Numar'] > 0){
            $sum=(int)$row["Numar"]-$cantitate;
            $update="UPDATE piese SET Numar=$sum where NumePiesa='$tip'";
            $query2 = mysqli_query($conn,$update);
        }
        else
            echo "<script>alert('Nu exista stoc pentru aceasta piesa!');</script>";
   }
    
}


$select="SELECT * from piese";
$query = mysqli_query($conn,$select);

  
$count=mysqli_num_rows($query);
$form='<form method="post" action="scade_piese.php">';
 
    
$form.='  <div align=center class="container">';
$form.='        <label style="display:inline-block; text-align: right; width:100px;" for="tip"><b>Alege tipul</b></label>';
$form.='    <select style="width: 30%;" name="tip" id="tip">';


if(mysqli_num_rows($query) > 0)
{
    
   
    while($row = mysqli_fetch_assoc($query))

   {

    $form.=' <option value="'.$row["NumePiesa"].'">'.$row["NumePiesa"].'</option>';
   }
}
$form.='  </select>';
$form.='  <br></br>';
$form.='  <label style="display:inline-block; text-align: right; width:100px;" for="cantitate"><b>Cantitate</b></label>';
$form.='     <input type="text" placeholder="Introduceti cantitatea" name="cantitate" required>';
$form.='    <br></br>';
      
$form.='    <button  class="sub" type="submit">Scade</button>';
      
       
$form.='   </div>';
  
  
$form.='  </form>';
 
mysqli_close($conn);

$page = file_get_contents("edit_clear.html");
echo $page;
echo $form;


?>