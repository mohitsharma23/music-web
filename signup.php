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
  <link rel="stylesheet" href="sty.css">
</head>

<body>
  <?php
  if(isset($_SESSION['login_user'])){
    include('menu_user.php');
  }else{
    include('menu_std.php');
  }
?>


<div class="signup container">
  <div class="row">
    <div class="col-sm-6">
      <img src="rocksign.jpg">
      <h3>Join the Pack. Be a Streamer</h3>
    </div>
    <div class="col-sm-6">
      <form class="form-horizontal" action="signup.php" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-3" for="name">Name:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Enter Name" name="name">
          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="age">Age:</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" placeholder="Enter age" name="age">
          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="username">Username:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Enter Username" name="username">
          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="password">Password:</label>
          <div class="col-sm-8">
              <input type="password" class="form-control" placeholder="Enter password" name="password" id="password">
          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="repassword">Retype Password:</label>
          <div class="col-sm-8">
              <input type="password" class="form-control" placeholder="Enter password" name="repassword" id="repassword">
          </div>
          <div class="col-sm-1">
            <span id="message"></span>
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-default" id="submit">Submit</button>
          </div>
        </div>
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

<?php
if(isset($_POST['submit'])){
  $connect = mysql_connect("localhost", "root", "");
  $db = mysql_select_db("music", $connect);

  $name = $_POST['name'];
  $age = $_POST['age'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];

  $check = mysql_query("SELECT username FROM users WHERE username='$username'");
  if(mysql_num_rows($check) != 0){
    echo '<script type="text/javascript">alert("Username already exists");</script>';
  }else{
      $query = "INSERT INTO users VALUES ('$name', '$age', '$username', '$password')";
      if(!mysql_query($query)){
        echo "Error " .mysql_error();
      }else{
        echo '<script type="text/javascript">alert("Welcome to the Pack");</script>';
      }
    }
  }

?>
  <script src="script.js"></script>
</body>
</html>
