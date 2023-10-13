<?php
session_start();
include('connect.php');



$uname= $_SESSION['logged_user'];
$one=$_POST['preference1'];
$two=$_POST['preference2'];
$three=$_POST['preference3'];
$four=$_POST['preference4'];

$count=0;

if($one==$two||$one==$three||$one==$four)
{
   $count++;
}
if($two==$one||$two==$three||$two==$four)
{
   $count++;
}

if($three==$one||$three==$two||$three==$four)
{
   $count++;
}
if($four==$one||$four==$three||$four==$two)
{
   $count++;
}
if($count>2)
{
   echo "atleast two preferences must be unique";
}


else{
$sql="SELECT studentname FROM studentrequest where studentname='".$uname."' limit 1";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
  $sql="UPDATE studentrequest SET  preference1='".$one."' ,preference2='".$two."' ,preference3='".$three."' ,preference4='".$four."' WHERE studentname='".$uname."'  ";
  $result = $conn->query($sql);
     echo "Request Sent";

}
else{

 $newsql="INSERT INTO studentrequest (studentname,preference1,preference2,preference3,preference4)
    VALUES ('$uname','$one','$two','$three','$four')";
    $newresult = $conn->query($newsql);

    echo "Request Sent";

}

}

$conn->close();
?>