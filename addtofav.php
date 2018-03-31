<?php
session_start();
include('logged.php');
include('session.php');

$postid = $_POST['id'];


if(!isset($_SESSION['login_user'])){
  header('location: login.php');
}else{
  $query_favorite = "SELECT user, sid FROM fav";
  $favorite = mysql_query($query_favorite) or die(mysql_error());
  $row_favorite = mysql_fetch_assoc($favorite);
  $totalRows_favorite = mysql_num_rows($favorite);

  if(in_array($_POST['sid'], $row_favorite))
    {
        $del="DELETE FROM fav WHERE sid='$postid' AND user='$login_session' ";
        $result = mysql_query($del);
        //is already favourited, run a query to remove that row from the db, so it won't be favorited anymore
    }
    else
    {
        $add = "INSERT INTO fav(sid, user) VALUES('$postid', '$login_session')";
        $res = mysql_query($add);
        echo 1;
        //post is not favourited already, run a query to add a new favourite to the db.
    }
}
?>
