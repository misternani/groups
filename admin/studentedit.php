<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>admin</title>
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
        <div id="sidebar-wrapper-1" style="color: rgb(130,69,69);background: rgb(255,255,255);margin-left: 0px;height: 700px;position: fixed;width: 300px;">
            <ul class="sidebar-nav">
            <li> <a href="#" style="color: var(--bs-blue);font-weight: bold;font-family: Alata, sans-serif;width: 300px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-check-fill" style="font-size: 39px;color: var(--bs-blue);">
                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                    </svg>&nbsp;Convenor Dashboard</a></li>
            <li> <a href="studentlist.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 43px;">Students List</a></li>
            <li> <a href="supervisorlist.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Supervisors List</a></li>
            <li> <a href="topicslist.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Topics List</a></li>
            <li> <a href="groupslist.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Groups List</a></li>
            <li> <a href="addstudent.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Add Student</a></li>
            <li> <a href="addsupervisor.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Add Supervisor</a></li>
            <li> <a href="addtopic.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Add Topic</a></li>
            <li> <a href="assigntopic.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Assign Topic</a></li>
            <li> <a href="studentrequest.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Student Requests</a></li>
            <li> <a href="supervisorrequest.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Supervisor Requests</a></li>
            <li> <a href="changepassword.php" style="color: var(--bs-blue);font-size: 20px;font-family: Alata, sans-serif;">Change Password</a></li>
            <li> <a href="index.php" style="color: var(--bs-blue);font-size: 20px;font-family: Alata, sans-serif;">Logout</a></li>
        </ul>
        </div>
    </div>
    <section class="position-relative py-4 py-xl-5" style="margin-left: 160px;">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5" style="padding-bottom: 0px;margin-bottom: 40px;">
                            <h2 class="text-center mb-4" style="color: var(--bs-blue);font-weight: bold;font-family: Alata, sans-serif;">Student Details</h2>
                            <form method="post" action="stuedit.php">


                                <div class="mb-3">
                                    <label style="color: gray;font-weight: medium;">Username:</label>
                                     <?php


include('connect.php');



$uname=$_SESSION['user'];

$sql="SELECT username FROM student WHERE username='".$uname."' limit 1";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($row = mysqli_fetch_row($result))
 {
        $sgp=$row[0];
       echo  '<input id="name-2" class="form-control" type="text"  name="username" placeholder="Username" ';

       echo  "value ='".$row[0]."' "; 

       echo "readonly />";
   }

}



$conn->close();

?>  


                                   
                                </div>
                                   <div class="mb-3">
                                <label style="color: gray;font-weight: medium;">Email:</label>
                                                                  <?php
include('connect.php');






$sql="SELECT email FROM student WHERE username='".$uname."' limit 1";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($row = mysqli_fetch_row($result))
 {
        $sgp=$row[0];
       echo  '<input  class="form-control" type="email"  name="email" placeholder="Email" ';

       echo  "value ='".$row[0]."' "; 

       echo "required />";
   }

}



$conn->close();

?>  
    </div>


 <div class="mb-3">

<label style="color: gray;font-weight: medium;">Password:</label>

<?php
include('connect.php');






$sql="SELECT password FROM student WHERE username='".$uname."' limit 1";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($row = mysqli_fetch_row($result))
 {
        $sgp=$row[0];
      
       echo  '<input  class="form-control" type="text" style="margin-top: 0px;"  name="password" placeholder="Password" ';

       echo  "value ='".$row[0]."' "; 

       echo "required />";
   }

}



$conn->close();

?>  



                         
                                <div class="mb-3" style="margin-top: 10px;">
                                <label style="color: gray;font-weight: medium;">Group:</label>
                                <select class="form-select"  name="groupname">
                                    <?php
include('connect.php');






$sql="SELECT groupname FROM student WHERE username='".$uname."' limit 1";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($row = mysqli_fetch_row($result))
 {
        $sgp=$row[0];
       echo "   <option value='".$row[0]."'>".$row[0]."</option>";
}

}

$sql="SELECT groupname FROM grouplist";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($column = mysqli_fetch_row($result))
 {
    $tgp=$column[0];
    if($sgp!=$tgp)
    {
       echo "   <option value='".$column[0]."'>".$column[0]."</option>";
    }
    else{
        continue;
    }
}

}

$conn->close();

?>  
                                </select>

                                </div>
                                      <div class="mb-3">
                                <label style="color: gray;font-weight: medium;">Topic:</label>
                                <select class="form-select" style="margin-top: 0px;" name="topicname">
                                                            <?php
include('connect.php');






$sql="SELECT topicname FROM student WHERE username='".$uname."' limit 1";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($row = mysqli_fetch_row($result))
 {

          $ssgp=$row[0];
       echo "   <option value='".$row[0]."'>".$row[0]."</option>";
}

}
$sql="SELECT topicname FROM topiclist";
$result = $conn->query($sql);

if($result->num_rows >= 1)
{
 while ($column = mysqli_fetch_row($result))
 {
    $ttgp=$column[0];
    if($ssgp!=$ttgp)
    {
       echo "   <option value='".$column[0]."'>".$column[0]."</option>";
    }
    else{
        continue;
    }
}

}


$conn->close();

?>  
                                </select>
                               </div>
                                <div><button class="btn btn-primary d-block w-100" type="submit">Save Details</button></div>
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

