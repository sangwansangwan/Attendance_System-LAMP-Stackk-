
<!DOCTYPE HTML>  
<html>
<head>
<style>


@keyframes bounceIn {
  from,
  20%,
  40%,
  60%,
  80%,
  to {
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    transform: scale3d(0.3, 0.3, 0.3);
  }

  20% {
    transform: scale3d(1.1, 1.1, 1.1);
  }

  40% {
    transform: scale3d(0.9, 0.9, 0.9);
  }

  60% {
    opacity: 1;
    transform: scale3d(1.03, 1.03, 1.03);
  }

  80% {
    transform: scale3d(0.97, 0.97, 0.97);
  }

  to {
    opacity: 1;
    transform: scale3d(1, 1, 1);
  }
}

.bounceIn {
  animation-duration: 0.75s;
  animation-name: bounceIn;
}





.button {
  display: inline-block;
  padding: 6px 20px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}



.rcorners3 {
  border-radius: 20px;
  background: white;
  padding: 10px; 
  width: 180px;
  height: 3px; 
} 

.rcorners1 {
  border-radius: 25px;
  background: #73AD21;
  padding: 20px; 
  width: 200px;
  height: 150px; 
}
.rcorners2 {
  border-radius: 20px;
  background: white;
  padding: 10px; 
  width: 210px;
  height: 3px; 
}
  
.error {color: #FF0000;}
</style>
</head>
<body  
style="background-image:url('bg2.jpg'); height: 100%;  background-position: center; background-repeat: no-repeat;
  background-size: cover;"    class="bounceIn">  




<?php
session_start();
if($_SESSION['use']==session_id())   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:adminlogged.php"); 
 }



$Password = "";
$flag=0;
$Passwd="";
$email= "";
$emailErr="";



 
  if (empty($_POST["email"]) || empty($_POST["Password"])) {
    $emailErr = "Fields are required";} 




   else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $emailErr = "Invalid email format"; }
  else{
 
$Passwd=$_POST["Password"];
 
      $dbhost = "localhost";
      $usrname ="root";
      $pass= "Root111000";
      $dbname = "ritik";
      $conne=mysqli_connect($dbhost,$usrname,$pass,$dbname);
    $sql= "select * from DETAILS WHERE EMAIL_ID='$email' and PASS='$Passwd';";
           $qu=mysqli_query($conne,$sql);
             

         if (!mysqli_num_rows($qu)>0)
          {
            echo "<script type=\"text/javascript\">alert('Wrong email or Password entered');</script>"; 
       }         
       else {   
  
      $adm=str_split("admin@gmail.com");
      //$adm1=str_split("admin1@gmail.com");
      $g=str_split($email);
      $len=strlen($email);      
      $a;
      $b;

         for($counter=0;$counter<strlen($email);$counter++){
            if($g[$counter]==$adm[$counter]){ 
                 $a++;

               }
                       
              

              if($g[$counter]==$adm1[$counter]){ 
                 $b++;}
                    
            
              if($a!=$counter+1 && $b!=$counter+1){
              break;  }
    

              


                 }

      if($a==$len){
         $flag=1;
        }
      
      if($b==$len){
         $flag=2;
        }
        $user=$flag;
   

        if($flag==1){
        $_SESSION['use']=$user;
         header('Location: adminlogged.php');}

      
           
            
           
      if($flag==0){
             echo "<script type=\"text/javascript\">alert('Only admin user can access this page');</script>"; 
           }
               

}

           }
}



?>

<div align="center">
<div class="rcorners1"  align="center" style="border-style: groove; border-color: grey; margin: 100px; width: 300px;  height: 300px; border-width: 7px; background-color: white;"  >
<h1><center>Login Form</center></h1>
<form  method="post" action="login.php" >  
   <center> E-mail: <input class="rcorners2" type="text" name="email"></center>
   <br><br>
  
   Password: <input class="rcorners3" type="Password" name="Password">
      <span class="error">* <?php echo $emailErr;?></span><br><br>
   
  
   <input type="submit" class="button" name="submit" value="Log In">  
</form>

    <a href="signup.php"><h4>Create account here!</h4></a>
</div>
</div>


</body>
</html>