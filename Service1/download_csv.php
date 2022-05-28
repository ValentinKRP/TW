<?php
include_once("db/connection.php");


$select="SELECT * from conturi";
$query = mysqli_query($conn,$select);



$count=mysqli_num_rows($query);
$delimiter = ","; 
$filename = "users_" . date('Ymd') . ".csv"; 
     
    // Create a file pointer 
$f = fopen('php://memory', 'w'); 
     
    // Set column headers 
$fields = array('Id', 'Nume', 'Prenume', 'Email', 'Parola', 'NumarTelefon'); 
fputcsv($f, $fields, $delimiter);  
 
 
if(mysqli_num_rows($query) > 0)
{
    
   
    while($row = mysqli_fetch_assoc($query))

   {
    $lineData = array($row['ID'], $row['Nume'], $row['Prenume'], $row['Email'], $row['Parola'], $row['NumarTelefon']); 
    fputcsv($f, $lineData, $delimiter);
   }
   fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 

}

?>