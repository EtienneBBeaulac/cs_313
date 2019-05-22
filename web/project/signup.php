  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <?php require 'header-links.php' ?>
  </head>

  <body>
    <?php
    $username = '';
    $email = '';
    $unErr = '';
    $pwErr = '';
    $cpwErr = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['cpassword']) && isset($_POST['email'])) {
        require 'database-connection.php';
        $username = test_input($_POST['username']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $cpassword = test_input($_POST['cpassword']);
        $unErr = !preg_match("/^[0-9a-zA-Z_]{5,}$/", $username) ? '* Username must be bigger than 5 characters and contain only numbers, letters, and underscores' : '';
        $errors = checkPassword($password, $cpassword);
        $pwErr = $errors['pwErr'];
        $cpwErr = $errors['cpwErr'];
        if ($unErr == '' && $pwErr == '' && $cpwErr == '') {
          echo '<br>Succesful sign up';
        }
      }
    }
    function checkPassword($pw, $cpw)
    {
      $passwordErr = '';
      $cpasswordErr = '';
      if (!empty($pw) && ($pw == $cpw)) {
        if (strlen($_POST["password"]) < 8) {
          echo 'must be 8';
          $passwordErr = "* Your password must contain at least 8 characters";
        } elseif (!preg_match("#[0-9]+#", $pw)) {
          echo 'must have 1 number';
          $passwordErr = "* Your password must contain at least 1 number";
        } elseif (!preg_match("#[A-Z]+#", $pw)) {
          echo 'must have 1 cap';
          $passwordErr = "* Your password must contain at least 1 capital letter";
        } elseif (!preg_match("#[a-z]+#", $pw)) {
          echo 'must have 1 lower';
          $passwordErr = "* Your password must contain at least 1 lowercase letter";
        }
      } elseif (!empty($_POST["password"])) {
        $cpasswordErr = "* Passwords must match";
      } else {
        $passwordErr = "* Valid password is required";
      }
      return ['pwErr' => $passwordErr, 'cpwErr' => $cpasswordErr];
    }
    ?>
    <div class="container vertical-center justify-content-center">
      <div class="row">
        <div class="user-card" id="bookmark">
          <h1>Sign Up</h1>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>" placeholder="username" required>
            </div>
            <div class="invalid-feedback mb-2 d-block"><?php echo $unErr ?></div>
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="password" id="password" class="form-control" value="" placeholder="password" required>
            </div>
            <div class="invalid-feedback mb-2 d-block"><?php echo $pwErr ?></div>
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="cpassword" id="cpassword" class="form-control" value="" placeholder="confirm password" required>
            </div>
            <div class="invalid-feedback mb-2 d-block"><?php echo $cpwErr ?></div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" name="email" id="email" class="form-control" value="<?php echo $email ?>" placeholder="email" required>
            </div>
            <div class="d-flex justify-content-center mt-3 login_container">
              <button type="submit" name="button" class="btn btn-success">Sign up</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- <div class="container">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="username" value="<?php echo $username; ?>" required>
            <div class="invalid-feedback">Valid username is required</div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="password" value required>
            <div class="invalid-feedback"><?php echo $pwErr ?></div>
          </div>
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" id="email" placeholder="email" value="<?php echo $email; ?>" required>
          <div class="invalid-feedback">Valid email is required</div>
        </div>
        <button type="submit">Sign up</button>
      </div>
    </form> -->
    <?php require 'bootstrap-bottom.php' ?>
  </body>

  </html>