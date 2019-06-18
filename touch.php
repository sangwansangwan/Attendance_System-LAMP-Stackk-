<!DOCTYPE html>
<html>
<head>

  <style type="text/css">

.butt1{
     width: 45%;
     height: 5%;
     margin-left: 150px;
     font-size: xx-large;
     font-family: sans-serif;
     margin-bottom: 75px; 
     }


  

table, th{
border: 1px solid black;
background-color: #98AFC7 ;

}


td{


border: 1px solid black;
background-color: #E5E4E2 ;


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

.custom{
border-style: solid;

border-radius: 200px;

border-color: #ABCED5;

transition-property: 100;

width:1300px;

background-color: #ABCED5;

}




.p {
    margin-top: 25px;
    font-size: 21px;
    text-align: center;

    -webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
         -o-animation: fadein 2s; /* Opera < 12.1 */
            animation: fadein 2s;
}

@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}







  </style>



  </head>
<body  style="background-image: url(249.jpg); background-size: 1390px;">


  <div  style="background-image: url(bgu.jpg); border-radius: 50px;">
<div  align="right">
<h1><center>Admin Id</center>

<a href="logout.php" class="button"><span><div>Logout</div></span></a>
<a href="att.php" class="button"><span><div>Edit</div></span></a>
</div>
</div>
<br>
<hr>

<div class="p" >
<?php session_start(); ?>


<?php

if (!isset($_SESSION['use']))
        {
           header("Location:login.php");  
       }




$dbhost = "localhost";
      $usrname ="root";
      $pass= "Root111000";
      $dbname = "STUDENT";
      $conne=mysqli_connect($dbhost,$usrname,$pass,$dbname);

$dt="'".$_POST['datee']."'";
$sql="select * from DETAILS where DDATE= ".$dt;
$new=$sql;

      


/*
if(empty($saal)){
if($brunch==0 && $atten1==0){
    
    }else{$new=$sql." where BRANCH=".$brunch." and ATTENDANCE=". $atten;}
}
else{
  
}
*/



$brc=$_POST['bch'];


$attun=$_POST['atten1'];
$yr="'".$_POST['yearr']."'";


if($brc!='0'){
$new=$new." and BRANCH =". $brc;

}

if($attun!='0'){
$new=$new." and ATTENDANCE =". $attun;
}




 $ri=mysqli_query($conne,$new);
echo "<center><table >
<tr>
<th>NAME</th>
<th>ROLL NO.</th>
<th>ATTENDANCE</th>
<th>Branch</th>
<th>TIME</th>
<th>YEAR</th>
</tr></center>";

while($g=mysqli_fetch_assoc($ri)){ 


echo "<tr>";
echo "<td  style='width: 300px;  '>" . $g['NAME'] . "</td>";
echo "<td  style='width: 150px; '>" . $g['ROLL'] . "</td>";
echo "<td  style='width: 150px; '>" . $g['ATTENDANCE'] . "</td>";
echo "<td  style='width: 150px; '>" . $g['BRANCH'] . "</td>";
echo "<td  style='width: 150px; '>" . $g['DDATE'] . "</td>";
echo "<td  style='width: 100px; '>" . $g['YEAR'] . "</td>";
echo "</tr>";
     }

?>
</div>

<form  action='adminlogged.php' method="post">


 
<div  width:730px  >
       Sort by Branch:<select style="border-radius: 16px;" name="bch">
            <option value="0">ALL</option>
            <option value="'CSE'">CSE</option>
            <option value="'CE'">CE</option>
            <option value="'ME'">ME</option>
        </select>



Sort By Attendance:
<select style="border-radius: 16px;" name="atten1">
            <option value="0">ALL</option>
            <option value="'P'">Present</option>
            <option value="'A'">Absent</option>
        </select>


Seach By Year:<input style="border-radius: 16px;" type="number" name="yearr">


 <b>Date:</b><input class="rcorners1" style="border-radius: 16px;" name="datee" id="date"  type="date" ></input>
   <script type="text/javascript">
  var d = new Date().toISOString().slice(0, 10);
    document.getElementById("date").value = d;
   </script>


 
<input type="submit" name="submitb" value=" submit">  







</div>

      </form>
</body>
</html>
















