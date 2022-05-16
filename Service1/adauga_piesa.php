

<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="ServiceOnline";

$conn= mysqli_connect($servername,$username,$password,$dbname);

$select="SELECT * from piese";
$query = mysqli_query($conn,$select);


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
 








mysqli_close($conn);

$page = file_get_contents("edit_clear.html");
echo $page;
echo $form;
?>