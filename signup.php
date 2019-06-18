<!DOCTYPE html>
<html>
<head>
<style>
.block {
  border-radius: 20px;
  display: block;
  width: 80%;
  border: none;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}


div {
animation: shake 0.5s;
  animation-iteration-count: 1;

}



/* Standard syntax */
@keyframes shake {
   0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}


.rcorners1 {
  border-radius: 25px;
  background: #73AD21;
  padding: 20px; 
  width: 200px;
  height: 150px; 
}
.rcorners3 {
  border-radius: 20px;
  background: white;
  padding: 10px; 
  width: 180px;
  height: 3px; 
} 
.rcorners2 {
  border-radius: 20px;
  background: white;
  padding: 10px; 
  width: 210px;
  height: 3px; 
}
.bg{

background-image:url("bg2.jpg"); 


height: auto%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;


}
.error {color: #FF0000;}
</style>

</head>
<body class="bg">



<?php
session_start();
$Passwd="";
$error;
$email= "";
$emailErr="";
$Passwd=$_POST["Password"];
$Nome=$_POST['namep'];                               
$Branch=$_POST['Branch'];  
   //////////////////////////////////////////////////////////////////////////////////////
  if (empty($_POST["email"]) || empty($_POST["Password"]) ||empty($_POST["Branch"])|| empty($_POST["namep"]) || empty($_POST["saal"]) || empty($_POST["rollo"])) {
    $emailErr = "Fields are required";} 

   else {


    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $emailErr = "Invalid email format"; 
        }
          else{
  ///////////////////////////////////////////////////////////////////////////////////////
       $oh=$_POST['saal'];
       $ho=$_POST['rollo']; 

      $dbhost = "localhost";
      $usrname ="root";
      $pass= "Root111000";
      $dbname = "ritik";
      $conne=mysqli_connect($dbhost,$usrname,$pass,$dbname);
 
      
      $ri="select * from DETAILS WHERE EMAIL_ID='$email'";
      $row=mysqli_query($conne,$ri);

            if(mysqli_num_rows($row)>0)  
             {
              
                  echo "<script type=\"text/javascript\">alert('Id already registered, Just log in');</script>";        
            }    

else{
  
  
    $sql= "INSERT INTO DETAILS(EMAIL_ID,PASS, NAME, BRANCH, YEAR, ROLL) VALUE ('$email','$Passwd','$Nome','$Branch','$oh','$ho')";
   mysqli_query($conne,$sql); 
}





}





$emailErr = "User registered";
}


?>


<div align="center">
  <div  class="rcorners1" align="center" style="border-style: groove; border-color: grey; width: 300px;  height: 480px; border-width: 7px; background-color: white;"  >

<center><h1>Sign up</h1></center>
<form autocomplete="off" method="post" action="signup.php">  
    Name:<input class="rcorners3" type="text" name="namep" placeholder="Name"><br><br>
    Year:<input class="rcorners3" type="text" name="saal" placeholder="Year"><br><br>
    
   


    Branch: <select style="border-radius: 20px" name="Branch">
            <option value="CSE">Computer Science and Engineering</option>
            <option value="CE">Civil Engineering</option>
            <option value="ME">Mechanical Engineering</option>
        </select><br><br>


    Roll No. <input  onkeypress="return flux(event)"   name="rollo"  id="this" type="number" style="width: 90px;"  placeholder="Roll No." min="1" max="9999" ><br><br>
    
    <script type="text/javascript">
      function flux(evt){
      {
                var  charCode = evt.which;
              if (charCode < 48 || charCode > 59)
                      {return false;}
                return true;
      }}</script>
 

    E-mail: <input class="rcorners2"  name="email" value="" placeholder="E-mail" ><br><br>

    Password:  <input placeholder="Password" class="rcorners3" id="myInput" type="password" name="Password"><br><br>
   
    <span class="error">* <?php echo $emailErr;?></span><br><br>

    <input type="checkbox" onclick="myFunction()">Show Password<br><br>

    <input class="block" type="submit" name="submit" value="Submit">  

    <a href="login.php"><h4><center>Login!</center></h4></a>


 </form></div></div>
    
     <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>