<?php
session_start();
include('connect.php');


$uname= $_SESSION['logged_user'];


$sql="SELECT username FROM student where username='".$uname."' limit 1";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
  
$sql="SELECT * FROM student where username='".$uname."' limit 1";
$result = $conn->query($sql);


$newsql="SELECT * FROM student where username='".$uname."' limit 1";
$newresult = $conn->query($newsql);


if($newresult->num_rows == 1)
{
   while ($row = mysqli_fetch_row($newresult)) $tp[]=$row[5];
   $topic=$tp[0];

}
if($topic==' '||empty($topic)){
    $tp[0]="No topic Assigned";
}



$newwsql="SELECT * FROM student where username='".$uname."' limit 1";
$newwresult = $conn->query($newwsql);

if($newwresult->num_rows == 1)
{
   while ($row = mysqli_fetch_row($newwresult)) $gp[]=$row[4];
}
if($gp[0]==' '||empty($gp[0])){
    $gp[0]="No Group Selected";
}

$tepsql="SELECT * FROM topiclist where topicname='".$topic."' limit 1";
$tepresult = $conn->query($tepsql);
if($tepresult->num_rows == 1)
{
   while ($row = mysqli_fetch_row($tepresult)) $sp[]=$row[1];
}

else{

$sp[0]="No Supervisor Assigned";
}

if($sp[0]==' '||empty($sp[0])){
    $sp[0]="No Supervisor Assigned";
}

}






$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>groups</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata&amp;display=swap">
    <link rel="stylesheet" href="assets/css/dropdown-search-bs4.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-sidebar.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="wrapper" style="color: var(--bs-pink);">
        <div id="sidebar-wrapper" style="color: rgb(130,69,69);background: rgb(255,255,255);margin-left: -227px;height: 550px;position: fixed;">
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
    <section class="d-grid" style="background: #ffffff;height: 500px;width: 1000px;padding-left: 0px;margin-left: 285px;position: relative;display: grid;margin-top: 1px;border-color: var(--bs-pink);">
        <ul class="list-unstyled" style="margin-left: 88px;">
            <li class="text-start" style="color: var(--bs-blue);font-size: 35px;font-weight: bold;font-family: Alata, sans-serif;margin-top: 64px;margin-right: -1px;">My Selections</li>
            <li class="text-start" style="color: rgb(255,214,0);"><button class="btn btn-primary text-center" type="button" style="background: var(--bs-orange);font-weight: bold;font-size: 20px;width: 100px;">Topic</button></li>
            <li class="text-start" style="color: rgb(187,208,228);font-weight: bold;font-size: 25px;"><?php echo $tp[0];?>
        </li>
            <li class="text-start" style="color: rgb(255,214,0);margin-top: 22px;"><button class="btn btn-primary text-center" type="" style="background: var(--bs-green);font-weight: bold;font-size: 20px;width: 100px;">Group</button></li>
            <li class="text-start" style="color: rgb(187,208,228);font-weight: bold;font-size: 25px;"><?php echo $gp[0];?></li>
            <li class="text-start" style="color: rgb(255,214,0);margin-top: 22px;"><button class="btn btn-primary text-center" style="background: var(--bs-red);font-weight: bold;font-size: 20px;width: 130px;">Supervisor</button></li>
            <li class="text-start" style="color: rgb(187,208,228);font-weight: bold;font-size: 25px;"><?php echo $sp[0];?></li>
        </ul>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>