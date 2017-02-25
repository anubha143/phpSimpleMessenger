<?php
require('includes/config.php');
if(isset($_POST['username']) && isset($_POST['eroll']))
{
$username=$_POST['username'];
$eroll=$_POST['eroll'];
$pass=md5($_POST['pass']);

$sql="INSERT INTO user_data (user_name,user_roll,user_pass) VALUES('$username',$eroll,'$pass')";
if($res=mysqli_query($con,$sql))
{
  echo "registration successfully";
}
else{
  echo "there is some problem over here" . mysqli_error($con);
}
}
?>
