<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>supervisor</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata&amp;display=swap">
    <link rel="stylesheet" href="assets/css/dropdown-search-bs4.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-sidebar.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
</head>

<body>
    <div id="wrapper" style="color: var(--bs-pink);width: 300px;height: 0px;">
        <div id="sidebar-wrapper" style="color: rgb(130,69,69);background: rgb(255,255,255);margin-left: -227px;height: 550px;position: fixed;width: 300px;">
            <ul class="sidebar-nav">
                <li> <a href="#" style="color: var(--bs-blue);font-weight: bold;font-family: Alata, sans-serif;width: 300px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-bounding-box" style="font-size: 39px;color: var(--bs-blue);">
                            <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"></path>
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                        </svg>&nbsp;Supervisor Dashboard</a></li>
                <li> <a href="topic.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 43px;">Assigned Topic</a></li>
                <li> <a href="students.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Assigned Students</a></li>
                <li> <a href="createrequest.php" style="padding-bottom: 0px;margin-bottom: 10px;color: var(--bs-blue);font-family: Alata, sans-serif;font-size: 20px;margin-top: 10px;">Request Topic change</a></li>
                <li> <a href="changepassword.html" style="color: var(--bs-blue);font-size: 20px;font-family: Alata, sans-serif;">Change Password</a></li>
                <li> <a href="index.html" style="color: var(--bs-blue);font-size: 20px;font-family: Alata, sans-serif;">Logout</a></li>
            </ul>
        </div>
    </div>
    <section class="d-grid" style="background: #ffffff;height: 500px;width: 1000px;padding-left: 0px;margin-left: 285px;position: relative;display: grid;margin-top: 1px;border-color: var(--bs-pink);">
        <ul class="list-unstyled" style="margin-left: 88px;width: 400px;">
            <li class="text-start" style="color: var(--bs-blue);font-size: 35px;font-weight: bold;font-family: Alata, sans-serif;margin-top: 64px;margin-right: -1px;">&nbsp; &nbsp;&nbsp;</li>
            <li class="text-start" style="color: rgb(255,214,0);margin-top: 22px;"><button class="btn btn-primary text-center" type="" style="background: var(--bs-green);font-weight: bold;font-size: 20px;width: 300px;">Students Assigned</button></li>


            <?php
session_start();
include('connect.php');

$uname=$_SESSION['logged'];

$top=$_SESSION['topp'];
if($top==' '||empty($top))
{

     echo ' <li class="text-start" style="color: rgb(187,208,228);font-weight: bold;font-size: 25px;">No Students Assigned</li>';
}
else{
$sql="SELECT username FROM student where topicname='".$top."' ";
$result = $conn->query($sql);
if($result->num_rows >= 1)
{

   while ($row = mysqli_fetch_row($result)) 
   {
        
        echo '<li class="text-start" style="color: rgb(187,208,228);font-weight: bold;font-size: 25px;">';
        echo $row[0];
        echo "</li>";
       
   }
}


else
{

        echo ' <li class="text-start" style="color: rgb(187,208,228);font-weight: bold;font-size: 25px;">No Students Assigned</li>';
}
}
?>

           
        </ul>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>