<!DOCTYPE html>
<html><style type="text/css">
	.block {
  border-radius: 20px;
  display: block;
  width: 20%;
  border: none;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;

   }
.bg{
		background-image:url("bg2.jpg"); 
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
   }


table, th{
border: 1px solid black;
background-color: #98AFC7 ;
}


td{
border: 1px solid black;
background-color: #E5E4E2 ;
  }

  .rcorners1 {
  border-radius: 25px;
  background: #73AD21;
 
  width:170px;
  height: 15px; 
}

.button {
  display: inline-block;
  border-radius: 80px;
  background-color: #73AD21;;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 20px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 15px;
    }

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
    }

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
    }

.button:hover span {
  padding-right: 20px;
    }

.button:hover span:after {
     opacity: 1;
     right: 0;
    }

</style>
<body class="bg">

<div align="right">
 <h1><center>Student Portal</center>
  <a href="adminlogged.php" class="button"><span><div>Go Back</div></span></a>
</div>
<br>
<hr>



<?php session_start(); ?>
<?php


if (!isset($_SESSION['use'])) 
        {
         
           header("Location:login.php");  
        }


$ll=$_POST['datee'];
//$_SESSION['nn']=$ll;


 





$jkl="<div name='dom'></div>";
echo $jkl;


   

$yes;
$br;
$yea;
$roll;
$att="";
$nome="";
$dute=$_POST['datee'];
//$att=$_POST['Attendance'];
//$brc=$_POST['Branch'];



if(!isset($dute)){
$dute = date('Y-m-d', time());

}




$coon=mysqli_connect("localhost","root","Root111000","ritik");
   
   $rri="select * from DETAILS";
   $roow=mysqli_query($coon,$rri);


echo "<center><table >
<tr>
<th>NAME</th>
<th>ROLL NO.</th>
<th>MAIL ID</th>
<th>Branch</th>
<th>YEAR</th>
<th>ATTENDANCE</th>
</tr></center>";




while($g=mysqli_fetch_assoc($roow)){ 

$arr=array($a);

echo "
	<tr>
		<td  style='width: 150px;  '>" . $g['NAME'] . "</td>
		<td  style='width: 150px; '>" . $g['ROLL'] . "</td>
		<td  style='width: 150px; '>" . $g['EMAIL_ID'] . "</td>
		<td  style='width: 150px; '>" . $g['BRANCH'] . "</td>
		<td  style='width: 100px; '>" . $g['YEAR'] . "</td>
		<td  style='width: 100px; '> <form > 
<select onchange='showCustomer(this.value)'>

<option value=''></option>
<option value='".$g['NAME']." P  ".  $g['BRANCH'] . "  "  .  $dute .  "    " . $g['YEAR'] . "  ".  $g['ROLL'] . "'>Present</option>
<option value='".$g['NAME']." A ".  $g['BRANCH'] . "  " . $dute .  "    " . $g['YEAR'] . "  ".  $g['ROLL'] . "'>Absent</option>
</select>
</form>                      	
  </td>
	</tr>";
     }



$thio= "<div id='demo'></div>";
echo "$thio";






echo "<script>function showCustomer(str) {
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
              document.getElementById('demo').innerHTML = this.responseText;
    }
  };
   xhttp.open('GET', 'trace.php?q='+str, false);
  xhttp.send();	
}
</script>";





?>







<form action="att.php"  method="POST">
    <b>Date:</b><input class="rcorners1" style="border-radius: 16px;" name="datee" id="date" onchange="show(this.value)" type="date" ></input>
   <script type="text/javascript">
	var d = new Date().toISOString().slice(0, 10);
    document.getElementById("date").value = d;
   </script>
    <input type="submit" name="submit" style="border-radius: 10px;" value="Set date">
</form>
</body>  
</html>