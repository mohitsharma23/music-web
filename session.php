<?php

$connect = mysql_connect("localhost", "root", "");
$db = mysql_select_db("music", $connect);

$user_check = $_SESSION['login_user'];

$sec = mysql_query("SELECT username from users where username='$user_check'");
$row = mysql_fetch_assoc($sec);
$login_session = $row['username'];

if(!isset($login_session)){
  mysql_close($connect);
  header('Location: index.php');
}
 ?>
