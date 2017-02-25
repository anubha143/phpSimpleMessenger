<?php
session_start();
require('includes/config.php');

if( isset($_POST['eroll']) && isset($_POST['pass']));
{
  $result=null;
  $pass=md5($_POST['pass']);
  $eroll=$_POST['eroll'];
  if(is_numeric($eroll))
  {
  $sql="select user_name from user_data where user_roll=$eroll AND user_pass='$pass'";
  $result=mysqli_query($con,$sql);
  }
  else {
    $sql="select user_name from user_data where user_name='$eroll' AND user_pass='$pass'";
    $result=mysqli_query($con,$sql);
 }
  $count=mysqli_num_rows($result);
  if($count==1){
    $row=mysqli_fetch_assoc($result);

    $_SESSION['eroll']=$eroll;
    //$_SESSION['username']=$username;
    $_SESSION['username']=$row['user_name'];
    header('location:chat.php');
  }
  else{
    echo "there is some problem in login" . mysqli_error($con);
  }
}
?>
