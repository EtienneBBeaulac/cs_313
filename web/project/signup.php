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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
        require 'database-connection.php';
        $username = test_input($_POST['username']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        echo "{$username}, {$password}, {$email}";
      }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="username" value="<?php echo $username; ?>" required>
            <div class="invalid-feedback">Valid username is required</div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="password" value required>
            <div class="invalid-feedback">Valid password is required</div>
          </div>
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" id="email" placeholder="username" value="<?php echo $email; ?>" required>
          <div class="invalid-feedback">Valid email is required</div>
        </div>
        <button type="submit">Sign up</button>
      </div>
    </form>
    <?php require 'bootstrap-bottom.php' ?>
  </body>

  </html>