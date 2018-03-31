<?php
$connect = mysql_connect("localhost", "root", "");
$db = mysql_select_db("music", $connect);

  $app = "http://localhost/music_web/";
  $inc = mysql_query("SELECT * FROM mfiles");

 ?>
