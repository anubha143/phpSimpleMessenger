<?php
$con=mysqli_connect('localhost','root','');
if(!$con){
  die("connection failed" . mysql_error());
}
mysqli_select_db($con,"chat");
if(isset($_SESSION['username'])){
  $lastseenupdate="update user_data set last_seen='".date('Y-m-d H:i:s')."' where user_name='".$_SESSION['username']."'";
  mysqli_query($con,$lastseenupdate);
}
?>
