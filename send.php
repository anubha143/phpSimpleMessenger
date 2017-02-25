<?php
session_start();
require('includes/config.php');
$msg=$_POST['msg'];
$to=$_POST['to'];
$from=$_SESSION['username'] ;
$sql="insert into user_chat(user_to,user_from,msg) values('$to','$from','$msg')";
mysqli_query($con,$sql);
header('location:chatbox.php?to='.$to);
?>
