<?php
session_start();
     include('connect.php');
$student=$_POST['student'];
$group=$_POST['group'];


if(isset($_POST['approve']))
{
	
	 $newsql="UPDATE student SET groupname='".$group."'
     WHERE username='".$student."' limit 1";
   
    $newresult = $conn->query($newsql);

     $sql="SELECT member2,member3,member4,member5 FROM grouplist where groupname='".$group."' ";
     $result = $conn->query($sql);
     if($result->num_rows >= 1)
     {
     while ($row = mysqli_fetch_row($result))
       {
          $temp=$row[0];
          if(empty($temp))
               {
                          $sql="UPDATE grouplist SET member2='".$student."'
                          WHERE groupname='".$group."' limit 1";
                          $result = $conn->query($sql);
                          break;
                }

                  $temp=$row[1];
          if(empty($temp))
               {
                          $sql="UPDATE grouplist SET member3='".$student."'
                          WHERE groupname='".$group."' limit 1";
                          $result = $conn->query($sql);
                          break;
                }
                  $temp=$row[2];
          if(empty($temp))
               {
                          $sql="UPDATE grouplist SET member4='".$student."'
                          WHERE groupname='".$group."' limit 1";
                          $result = $conn->query($sql);
                          break;
                }
                  $temp=$row[3];
          if(empty($temp))
               {
                          $sql="UPDATE grouplist SET member5='".$student."'
                          WHERE groupname='".$group."' limit 1";
                          $result = $conn->query($sql);
                          break;
                }


     }
   }


    $sql="DELETE FROM inviterequests WHERE studentname='".$student."' ";
    $conn->query($sql);
    echo "Request Approved";


}

if(isset($_POST['deny']))
{
	$sql="DELETE FROM inviterequests WHERE studentname='".$student."' ";
    $conn->query($sql);
	echo "Request Denied";


}

?>