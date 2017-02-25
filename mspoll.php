<?php
session_start();
require('includes/config.php');
$to=isset($_GET['to'])?$_GET['to']:'';
$from=$_SESSION['username'];
$id=intval($_GET['id']);
$sql="select * from user_chat where id>$id AND ((user_to='$to' AND user_from='$from') OR (user_to='$from' AND user_from='$to'))";
$result=mysqli_query($con,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
$arr=array();
$arr['id']=null;
$arr['d']=null;
while($row=mysqli_fetch_array($result))
{
  $arr['d'].= '<b>from '.$row['user_from'].':</b>'. $row['msg'].'<br/>';
  $arr['id']=$row['id'];
}
header('Content-Type: application/json');
echo json_encode($arr);

?>
