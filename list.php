<?php
//session_start();
require('includes/config.php');
$username=$_SESSION['username'];
$delay=date('Y-m-d H:i:s',strtotime('5 minutes ago'));
$sql="select user_name from user_data where last_seen>='$delay' AND user_name<>'$username'";
echo mysqli_error($con);
$result=mysqli_query($con,$sql);
?>
<div class="chat-sidebar">

<?php
while($row=mysqli_fetch_array($result))
{
  $uname=$row['user_name'];
  echo "<div class='sidebar-name'><a href='javascript:register_popup(\"$uname\",\"$uname\")'>";
  echo ' <img width="30" height="30" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p50x50/1510656_10203002897620130_521137935_n.jpg?oh=572eaca929315b26c58852d24bb73310&oe=54BEE7DA&__gda__=1418131725_c7fb34dd0f499751e94e77b1dd067f4c" />';
  echo '<span>'.$row['user_name'].'</span>';
  echo "</a></div>";

}
echo '</div>';

?>
