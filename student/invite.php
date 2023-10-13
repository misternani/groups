<?php
session_start();



                         





     include('connect.php');

 $student= $_POST['student'];
$uname= $_SESSION['logged_user'];


$sql="SELECT groupname FROM grouplist where creatorname='".$uname."' limit 1";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($row = mysqli_fetch_row($result))
 {
      $group=$row[0];
 }
}

$sql="SELECT studentname FROM inviterequests where studentname='".$student."' limit 1";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
    $sql="UPDATE inviterequests SET groupname='".$group."'  where studentname='".$student."' limit 1";
$result = $conn->query($sql);
  echo "request already sent";
}
else{
        $newsql="INSERT INTO inviterequests (studentname,groupname)
    VALUES ('$student','$group')";
    $newresult = $conn->query($newsql);

    echo "request sent";

}




   $conn->close();
  






?>
            