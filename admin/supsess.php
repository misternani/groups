<?php
session_start();

$_SESSION['uss']=$_GET['username'];
header("location: supervisoredit.php");


?>