<?php
session_start();

$_SESSION['user']=$_GET['username'];
header("location: studentedit.php");


?>