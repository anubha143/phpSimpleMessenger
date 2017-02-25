<?php
session_start();
require('includes/config.php');
$to=isset($_GET['to'])?$_GET['to']:'';
?>
<!DOCTYPE html>
<html style="width:300px">
<head>
  <title>Chatroom</title>
  <link rel="stylesheet" href="chatbox.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body style="width:300px">

<?php
$from=$_SESSION['username'];
$sql="select * from user_chat where (user_to='$to' AND user_from='$from') OR (user_to='$from' AND user_from='$to')";
$result=mysqli_query($con,$sql);
$last=null;
echo '<div id="msgs">';
while($row=mysqli_fetch_array($result))
{
  echo '<b>';
echo 'from '.$row['user_from'].':</b>';
echo $row['msg'].'<br/>';
$last=$row['id'];
}
echo '</div>';
?>
<br/><br/>
<form action="send.php" method="post" style="position:fixed;bottom:0;">
  <input id="txtarea" name="msg" type="text"/>
<input type="hidden" value="<?php echo $to;?>" name="to"/>
</form>


<script>
var last=<?php echo $last ?>;
var audio = new Audio('sound/notify.mp3');
//sending ajax request
function poll(){
  $.get('mspoll.php',{to:"<?php echo $to; ?>",id:last},function(data){
    if(data.id) {
      $('#msgs').append(data.d);
      last=data.id;
      audio.play();
    }
    setTimeout(poll,2000);
  });
}
poll();

</script>
</body>
</html>
