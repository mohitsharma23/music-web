<?php

session_start();
$error = '';
if(isset($_POST['submit'])){
  if(empty($_POST['username']) || empty($_POST['password'])){
    $error = "Username/password is invalid";
  }
  else{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connect = mysql_connect("localhost", "root", "");
    $db = mysql_select_db("music", $connect);

    $query = mysql_query("SELECT * from users where password='$password' AND username='$username'");
    $row = mysql_num_rows($query);
    if($row == 1){
      $_SESSION['login_user'] = $username;
      header('Location: profile.php');
    }else{
      $error = "Username/password is invalid";
    }
  mysql_close($connect);
  }
}
?>
