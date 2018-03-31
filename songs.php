<?php
include('logged.php');

$id = $_SESSION['login_user'];
$sid[0]=0;
$fav = mysql_query("SELECT * from fav where sid='$id'");
while ($fav1 = mysql_fetch_array($fav)) {
    $sid[]=$fav1["sid"];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Music</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="sty.css">


</head>

<body>
  <?php
  if(isset($_SESSION['login_user'])){
    include('menu_user.php');
  }else{
    include('menu_std.php');
  }
?>
<div class="row container">
  <div class="col-sm-4">
    Name
  </div>
  <div class="col-sm-4">
    Song
  </div>
  <div class="col-sm-3">
    Artist
  </div>
  <div class="col-sm-1">

  </div>

</div>

<hr>
<?php
  include('songinc.php');
  while($arr = mysql_fetch_assoc($inc)){
  $path = $arr['pathname'];
  $name = $arr['title'];
  $artist = $arr['artist'];
  $id = $arr['id'];

  $fullp = $app . '' . $path;

  ?>
  <div class="row container">
    <div class="col-sm-4">
          <p><?php echo $name; ?></p>
    </div>
    <div class="col-sm-4">
      <audio controls>
        <source src="<?php echo $fullp; ?>" type="audio/mpeg">
      </audio>
    </div>
    <div class="col-sm-3">
            <p><?php echo $artist; ?></p>
            <!-- <p><?php echo $id; ?></p> -->
    </div>
    <div class="col-sm-1">
<?php
if(in_array($id, $sid)){
  ?>
      <a href="#" class="favourite" id="<?php echo $id; ?>"><img src="pheart.png" height="20px" width="20px"/></a>
<?php
}else{
  ?>
  <a href="#" class="favourite" id="<?php echo $id; ?>"><img src="gheart.png" height="20px" width="20px"/></a>
  <?php
}
  ?>
      <!-- <a href="#"><button type="button" name="addFav" class="glyphicon glyphicon-heart favourite"></button></a>
      <a href="#"><button type="button" name="removeFav" class="glyphicon glyphicon-remove"></button></a> -->
    </div>
  </div>
<br>
<?php
}
 ?>







<!-- Footer -->
  <div class="footer container">
    <div class="row">
      <div class="col-sm-4">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Blog Post</a></li>
          <li><a href="#">Songs</a></li>
        </ul>
      </div>
      <div class="col-sm-4">
        <p>Have a special song stuck in your head. Search it </p>
        <form action="">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-default pull-right">Submit</button>
          </div>

        </form>
        <p>Or Contact Us, we will try our best to post it</p>
      </div>
      <div class="col-sm-4">
        <!-- Social links and copyright -->
      </div>
    </div>
  </div>

  <script>
      $(document).ready(function() {
      $('.favourite').on('click', null, function() {
      var _this = $(this);
      var postid = $(this).attr('id');
      // alert(postid);
      $.ajax({
        type     : 'POST',
        url      : 'addtofav.php',
        data     : 'id='+ postid,
        complete : function(data) {
             if(_this.siblings('.favourite'))
             {
               _this.html('<img src="pheart.png" height="20px" width="20px" />');
             }
             else
             {
               _this.html('<img src="gheart.png height="20px" width="20px" />');
             }
          }
          });
      });
  });

  </script>



    <script src="script.js"></script>
</body>

</html>
