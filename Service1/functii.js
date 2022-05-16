 
var slideIndex = 0;
showSlides();

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  document.getElementById("nr").innerHTML="22";

 
function load()
{ 
   
    var us=localStorage.getItem("user");
  var user=JSON.parse(us);
  if(user==null)
  {
    
    document.getElementById("logare").innerHTML = "<a href='login.html'>Logare</a>";
  }
  else
  { if(user=="admin@yahoo.com")
     document.getElementById("logare").innerHTML = "<a href='edit_admin.html'>"+user+"</a>";
    else
     document.getElementById("logare").innerHTML = "<a href='edit.html'>"+user+"</a>";
  }
  
     
     
      
    
}
 
function logout()
{
  localStorage.removeItem('user');
  localStorage.removeItem('logat');
  alert("V-ati delogat cu succes!");
  window.location.href="login.html";
}
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2500); 
}
 
function check() {
  
    var a= document.getElementById('psw').value;
    var b=document.getElementById('psw-repeat').value;
    if(a!=b)
    {
      document.getElementById("valid").innerHTML = "<b style='color:red'>Parolele nu corespund</b>";
      

      return false;
    }
    else
    { if(a.length >= 8){
      document.getElementById("valid").innerHTML = "<b style='color:green'>Parolele  corespund</b>";
      return true;
      }else
      {
        document.getElementById("valid").innerHTML = "<b style='color:red'>Parola este mai mica de 8 caractere!</b>";
        return false;
      }

    }
   
}

function Logged()
{
	var lo=localStorage.getItem('logat');
	var logged=JSON.parse(lo);
	 
	var obj;
	if(logged=="logat")
		obj="<button  id='sub'  class='sub' type='submit'>Trimite cererea</button>";
	else
		obj="<p style='color:red; font-size:20px;' >Pentru a trimite o cerere trebuie sa fiti logat</p>"; 
	
	document.getElementById("iflogged").innerHTML = obj;
 
}
