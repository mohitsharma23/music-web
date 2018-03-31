<?php
include('logged.php');

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

  <!--headimage-->
  <div class="img-bg">
    <a href="#"><button type="button" class="btn btn-large main_btn">Stream Now</button></a>
  </div>

<!-- Main -->
  <div class="main container">
    <div class="row" id="main">
      <div class="col-sm-4">
        <img src="1.jpg" height="150px" width="150px">
        <p>Over 9000+ Songs</p>
      </div>
      <div class="col-sm-4">
        <img src="2.jpg" height="150px" width="150px">
        <p>Over 1000+ Happy Listeners</p>
      </div>
      <div class="col-sm-4">
        <img src="3.jpg" height="150px" width="150px">
        <p>News about New Songs</p>
      </div>
    </div>
  </div>

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

    <script src="script.js"></script>
</body>

</html>
