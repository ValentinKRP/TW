<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="ServiceOnline";
$tip=$_POST["tip"];
$cantitate=$_POST["cantitate"];
$furnizor=$_POST["furnizor"];
$conn= mysqli_connect($servername,$username,$password,$dbname);
$select="SELECT * from piese where NumePiesa='$tip'";
$query = mysqli_query($conn,$select);
$sum=0;
if(mysqli_num_rows($query) > 0)
{
    
   
    while($row = mysqli_fetch_assoc($query))
    {    
        
            $sum=(int)$row["Numar"]+$cantitate;
   }
    
}
$update="UPDATE piese SET Numar=$sum where NumePiesa='$tip'";
$query2 = mysqli_query($conn,$update);

$select="SELECT * from piese";
$query = mysqli_query($conn,$select);

  
$count=mysqli_num_rows($query);
$form='<form method="post" action="furnizor.php">';
 
    
$form.='  <div align=center class="container">';
$form.='<p style="font-size:20px;">Creeaza o cerere pentru furnizor</p>';
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
$form.='  <label style="display:inline-block; text-align: right; width:100px;" for="furnizor"><b>Nume furnizor</b></label>';
$form.='     <input type="text" placeholder="Introduceti numele furnizorului" name="furnizor" required>';
$form.='    <br></br>';
$form.='  <label style="display:inline-block; text-align: right; width:100px;" for="cantitate"><b>Cantitate</b></label>';
$form.='     <input type="text" placeholder="Introduceti cantitatea" name="cantitate" required>';
$form.='    <br></br>';
      
$form.='    <button  class="sub" type="submit">Creeaza cererea</button>';
      
       
$form.='   </div>';
  
  
$form.='  </form>';
 
$select="SELECT * from cererifurnizori";
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
 
$date = date("d m Y");
 
$insert="INSERT INTO cererifurnizori(ID, NumeFurnizor,DataCererii, Cantitate,Piesa) VALUES ('$id_max','$furnizor','$date','$cantitate','$tip')";
$query2=mysqli_query($conn,$insert);

$page = file_get_contents("edit_clear.html");
echo $page;
echo $form;
mysqli_close($conn);
 


?>