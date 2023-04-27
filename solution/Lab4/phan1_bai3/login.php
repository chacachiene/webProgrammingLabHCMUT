<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>phan2 bai 3</title>
</head>
<body>
<?php
    session_start();
    if(isset($_SESSION['name']) ){
        header('Location: info.php');
    }
 ?>

<!-- //   <form method="post">
//         <input name="username" placeholder="Username" type="text" />
//         <br>
//         <input name="password" placeholder="Password" type="password" />
//         <br>
//         <input name="submit" value="Login" type="submit"/>
//       </form> -->
  <div class="login-box">
  <h2>Login</h2>
  <form method="post">
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Password</label>
    </div>
    <a href="" onclick="document.forms[0].submit()">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </a>
    <input name="submit" type="submit" style="display:none;">
  </form>
  <?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == 'admin' && $password == '123456'){
            $_SESSION['name'] = $username;
            header('Location: info.php');
        } else{
            ?>
            <div class="alert alert-danger" role="alert">
                Sai tên đăng nhập hoặc mật khẩu
            </div>
            <?php

        }
    }
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  </body>
</html>