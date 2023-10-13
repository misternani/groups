<?php
session_start();
     include('connect.php');
$student=$_POST['student'];
$topic=$_POST['topic'];


if(isset($_POST['approve']))
{
	
	 $newsql="UPDATE student SET topicname='".$topic."'
     WHERE username='".$student."' limit 1";
   
    $newresult = $conn->query($newsql);



    $sql="DELETE FROM studentrequest WHERE studentname='".$student."' ";
    $conn->query($sql);
    echo "Request Approved";


}

if(isset($_POST['deny']))
{
	$sql="DELETE FROM studentrequest WHERE studentname='".$student."' ";
    $conn->query($sql);
	echo "Request Denied";


}

?>