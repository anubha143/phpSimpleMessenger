<?php
session_start();
if(isset($_SESSION['eroll']) || isset($_SESSION['username'])){
  header('location:chat.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <table>
  <tr>
    <form action="login.php" method="POST">
  <td>Enrollment:</td> <td><input type="text" name="eroll" placeholder="username or enrollment no"></td><br>
</tr>
<tr>
  <td>Password:</td> <td><input type="password" name="pass"></td><br>
</tr>
<tr>
  <td></td> <td><input type="submit" name="submit" value="login">or<a href="reg.php">Sign up</a></td>
</tr>
</form>
</table>
</body>
</html>
