<?php
session_start();
if (isset($_SESSION['login'])) {
  header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <?php require 'header-links.php' ?>
</head>

<body>
  <div class="container vertical-center justify-content-center">
    <div class="row">
      <div class="user-card" id="bookmark">
        <h1>Sign In</h1>
        <form action="login.php" method="post">
          <div class="input-group mb-3">
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="" class="form-control" value="" placeholder="username">
          </div>
          <div class="input-group mb-2">
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="" class="form-control" value="" placeholder="password">
          </div>
          <div class="d-flex justify-content-center mt-3 login_container">
            <button type="submit" name="button" class="btn btn-warning">Login</button>
          </div>
        </form>
        <div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="signup.php" class="ml-2">Sign Up</a>
					</div>
					<!-- <div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div> -->
				</div>
      </div>
    </div>
  </div>
  <?php require 'bootstrap-bottom.php' ?>
</body>

</html>