
<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="ServiceOnline";


$conn= mysqli_connect($servername,$username,$password,$dbname);

$email=$_POST["email"];

$psw=$_POST["psw"];



$select="SELECT * from conturi where email='$email'";
$query = mysqli_query($conn,$select);



   
 $qq=mysqli_num_rows($query);
 $row = mysqli_fetch_assoc($query);
 if($row["Parola"]==$psw)
 { mysqli_close($conn);
  $homepage = file_get_contents("home.html");
  echo $homepage;
  
  echo "<script> localStorage.setItem('user', JSON.stringify('".$row["Email"]."')); alert('Logarea a avut succes!'); </script>";
 
  echo "<script> localStorage.setItem('id', JSON.stringify('".$row["ID"]."'));  </script>";
  echo "<script> localStorage.setItem('nume', JSON.stringify('".$row["Nume"]."'));  </script>";
  echo "<script> localStorage.setItem('prenume', JSON.stringify('".$row["Prenume"]."'));  </script>";
  echo "<script> localStorage.setItem('email', JSON.stringify('".$row["Email"]."'));  </script>";
  echo "<script> localStorage.setItem('telefon', JSON.stringify('".$row["NumarTelefon"]."'));  </script>";
  echo "<script> localStorage.setItem('parola', JSON.stringify('".$row["Parola"]."'));  </script>";

  echo "<script> localStorage.setItem('logat', JSON.stringify('logat'));  </script>";
 }
  else
  {
      $login_page = file_get_contents("login.html");
      echo $login_page;
      echo "<script>alert('Cont inexistent!');</script>";
  }

 

?>


