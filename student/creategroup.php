<?php 

session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php  
include('connect.php');

$s="block";
$n="none";
$messag=" ";
$m="none";
$uname= $_SESSION['logged_user'];


$sql="SELECT groupname FROM grouplist where creatorname='".$uname."' limit 1";
$result = $conn->query($sql);
if($result->num_rows >= 1)
{

    $s="none";
    $n="block";
   

}
else{
    $s="block";
    $n="none";

}




$sql="SELECT groupname FROM student where username='".$uname."' limit 1";
$result = $conn->query($sql);
if($result->num_rows >= 1)
{

     while ($row = mysqli_fetch_row($result))$r=$row[0];
}
if(!empty($r))
{
    $s="none";
    $m="block";
   

}
else{
    $s="block";
    $m="none";

}
 ?>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="new.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>admin</title>
     <style type="text/css">.mes{margin-left: 360px;color: lightgray;}</style>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata&amp;display=swap">
    <link rel="stylesheet" href="assets/css/dropdown-search-bs4.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-sidebar.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
</head>

<body>
    <div id="wrapper-1" style="color: var(--bs-pink);width: 300px;height: 0px;">
        <div id="sidebar-wrapper-1" style="color: rgb(130,69,69);background: rgb(255,255,255);margin-left: 27px;height: 700px;position: fixed;width: 300px;">
          <ul class="sidebar-nav">
                <li> <a href="#" style="color: var(--bs-blue);font-weight: bold;font-family: Alata, sans-serif;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-badge-fill" style="font-size: 39px;color: var(--bs-blue);">
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"></path>
                        </svg>&nbsp;Student Dashboard</a></li>
                <li> <a href="Dashboard.php" style="margin-top: 46px;padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;">My selections</a></li>
                <li> <a href="group.php" style="margin-bottom: 5px;font-size: 20px;color: var(--bs-blue);font-family: Alata, sans-serif;">Join a Group</a></li>
                 <li> <a href="creategroup.php" style="margin-bottom: 5px;font-size: 20px;color: var(--bs-blue);font-family: Alata, sans-serif;">Create Group</a></li>
                <li> <a href="selecttopic.php" style="margin-bottom: 8px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;">Select Topic</a></li>
                <li> <a href="changepassword.html" style="color: var(--bs-blue);font-size: 20px;font-family: Alata, sans-serif;">Change Password</a></li>
                <li> <a href="index.html" style="color: var(--bs-blue);font-size: 20px;font-family: Alata, sans-serif;">Logout</a></li>
            </ul>
        </div>
    </div>
     <?php echo '<h1 class="mes">';

     echo "$messag</h1>"; 
     ?>

       <div style="display:<?php echo $m;?>">
            <h2 class="text-center mb-4" style="color: var(--bs-blue);font-weight: bold;font-family: Alata, sans-serif;">You already joined in a group</h2></div>
     <div style="display:<?php echo $n;?>">
            <h2 class="text-center mb-4" style="color: var(--bs-blue);font-weight: bold;font-family: Alata, sans-serif;">Your Group Details</h2>
             <table style="width: 600px;height: 50px;position: static;margin-left: 379px;border-radius: 10px;">
    <tr>
        <th>GroupName</th>
        <th>TopicName</th>
  
          <th>Member1</th>
            <th>Member2</th>
          <th>Member3</th>
                                      <th>Member4</th>
                                  <th>Member5</th>

    </tr>

      <?php

include('connect.php');



  $uname=  $_SESSION['logged_user'];


$sql="SELECT * FROM grouplist where creatorname='".$uname."' ";
$result = $conn->query($sql);


 


if($result->num_rows >= 1)
{
 while ($row = mysqli_fetch_row($result))
 {

    echo "<tr>";
      


          echo  "<td>$row[0]</td>"; 

           echo  "<td>$row[6]</td>"; 

           echo  "<td>$row[1]</td>"; 
           echo  "<td>$row[2]</td>"; 
           echo  "<td>$row[3]</td>"; 
           echo  "<td>$row[4]</td>"; 
           echo  "<td>$row[5]</td>"; 
       
            

            echo "</tr>";

        
}
}


else{



}












$conn->close();

?>


</table>
    



     </div>


     <div style="display:<?php echo $n;?>;width: 500px;margin-left: 500px;margin-top: 50px;">

         <h2 class="text-center mb-4" style="color: var(--bs-blue);font-weight: bold;font-family: Alata, sans-serif;">Invite Student</h2>
<form method="post" action="invite.php">
     <select class="form-select" name="student" style="display:inline;">
                                    <?php
include('connect.php');




 $bsql="SELECT creatorname FROM grouplist";
$bresult = $conn->query($bsql);

$uname=  $_SESSION['logged_user'];
$sql="SELECT username FROM student";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($column = mysqli_fetch_row($result))
 {
        if($uname==$column[0])
            {continue;}
        
           
            
                else{ echo "   <option value='".$column[0]."'>".$column[0]."</option>";}
     
   
}

}

$conn->close();

?>  
                                </select>

                                <button class="btn btn-primary d-block w-100" type="submit" style="margin-top: 20px;">Send Invite</button>
                                </form>

     </div>
      <div style="display:<?php echo $n;?>;width: 500px;margin-left: 500px;margin-top: 50px;">
         <h2 class="text-center mb-4" style="color: var(--bs-blue);font-weight: bold;font-family: Alata, sans-serif;">Join Requests</h2>

          <table style="width: 600px;height: 50px;position: static;margin-left: 5px;border-radius: 10px;">
        <tr><th>Username</th><th>Action</th></tr>
        <?php

include('connect.php');



$uname=  $_SESSION['logged_user'];
$sql="SELECT groupname FROM grouplist where creatorname='".$uname."' ";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($row = mysqli_fetch_row($result))
 {
    $group=$row[0];
}
}

$sql="SELECT studentname FROM joinrequests where groupname='".$group."' ";
$result = $conn->query($sql);





if($result->num_rows >= 1)
{
 while ($row = mysqli_fetch_row($result))
 {
  
   echo "<tr>";
      


          echo  "<td>$row[0]</td>"; 



            echo '<form method="post" action="admit.php">';
           

           

            echo "<td>";

            echo   '<input type="hidden" name="student"  ';

            echo " value='".$row[0]."' ";


            echo "/>";

             echo   '<input type="hidden" name="group"  ';

            echo " value='".$group."' ";


            echo "/>";


              
            echo '<button class="bnn" type="submit" name="approve" style="background:#20c997;display:inline;">Approve</button>';
             echo '<button class="bnn" type="submit" name="deny" style="background:red;display:inline;">Deny</button>';

             echo "</td>";

             echo "</form>";

            echo "</tr>";

}
}


else{

}

?>


</table>

      </div>

    <section class="position-relative py-4 py-xl-5" class="switch" style="margin-left: 160px;display:<?php echo $s;?> ;">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5" style="padding-bottom: 0px;margin-bottom: 40px;">
                           
                            <h2 class="text-center mb-4" style="color: var(--bs-blue);font-weight: bold;font-family: Alata, sans-serif;">Create Group</h2>
                            <form method="post" action="addgroup.php">
                                <div class="mb-3"><input class="form-control" type="text" id="name-2" name="group" placeholder="Group Name" required></div>
                                <select class="form-select" style="margin-top: 15px;color: var(--bs-gray-600);" name="topic">
                                                                                                                      <?php
include('connect.php');






$sql="SELECT topicname FROM topiclist";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($row = mysqli_fetch_row($result))
 {
   echo "   <option value='".$row[0]."'>".$row[0]."</option>";
}


}


$conn->close();

?>  
                                    </select>
                                <div class="mb-3"></div>
                                <div class="mb-3"></div>
                                <div><button class="btn btn-primary d-block w-100" type="submit">Create</button></div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>

