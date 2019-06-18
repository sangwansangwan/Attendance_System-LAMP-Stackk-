
<?php
$con=mysqli_connect("localhost","root","Root111000","STUDENT");
$take=$_GET['q'];  

$comp = preg_split('/\s+/', $take);



$sql="select * from DETAILS where DDATE='$comp[3]' and ROLL='$comp[5]' ";
$sel=mysqli_query($con,$sql);



if(mysqli_num_rows($sel)==1){

$th = "update DETAILS set ATTENDANCE='$comp[1]' where DDATE='$comp[3]' and ROLL='$comp[5]' "; 

mysqli_query($con,$th);

}

else{
$rri="INSERT INTO DETAILS(NAME,ATTENDANCE,BRANCH,DDATE,YEAR,ROLL)VALUE('$comp[0]','$comp[1]','$comp[2]','$comp[3]','$comp[4]','$comp[5]')";

mysqli_query($con,$rri);
}


?>








