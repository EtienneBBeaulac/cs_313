<?php
session_start();
if (isset($_SESSION['login'])) {
  header('Location: home.php');
}
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$username = '';
$unErr = '';
$pwErr = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require 'database-connection.php';
  $unErr = verifyUsername();
  $pwErr = verifyPassword();
  if ($unErr == '' && $pwErr == '') {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    $stmt = $db->prepare('SELECT id, username, password, email FROM user_account WHERE username=:username');
    $stmt->execute(array(':username' => $username));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($rows)) {
      foreach ($rows as $user) {
        if (password_verify($password, $user['password'])) {
          loginSuccess($user);
        } else {
          $pwErr = '* Incorrect password';
        }
      }
    } else {
      $unErr = '* Username does not exist';
    }
  }
}

function verifyPassword()
{
  if (!isset($_POST['password'])) {
    return '* Password is required';
  }
  $pw = test_input($_POST['password']);
  if (strlen($pw) < 5 || !preg_match("#[0-9]+#", $pw) || !preg_match("#[A-Z]+#", $pw) || !preg_match("#[a-z]+#", $pw)) {
    return '* Invalid password';
  }
  return '';
}

function verifyUsername()
{
  if (!isset($_POST['username'])) {
    return '* Username is required';
  }
  if (!preg_match("/^[0-9a-zA-Z_]{5,}$/", test_input($_POST['username']))) {
    return '* Invalid username';
  }
  return '';
}

function loginSuccess($user)
{
  // TODO: Update last login time for user
  echo 'success!';
  $_SESSION['login'] = ['id' => $user['id'], 'username' => $user['username'], 'email' => $user['email']];
  header('Location: home.php');
  die();
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="input-group">
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="username" class="form-control" value="<?php echo $username ?>" placeholder="username" required autofocus>
          </div>
          <div class="invalid-feedback mb-3 d-block"><?php echo $unErr ?></div>
          <div class="input-group">
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="password" class="form-control" value="" placeholder="password" required>
          </div>
          <div class="invalid-feedback mb-3 d-block"><?php echo $pwErr ?></div>
          <div class="d-flex justify-content-center mt-2 login_container">
            <button type="submit" name="button" class="btn btn-warning">Login</button>
          </div>
        </form>
        <div class="mt-4">
          <div class="d-flex justify-content-center links">
            Don't have an account? <a href="signup.php" class="ml-2">Sign Up</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require 'bootstrap-bottom.php' ?>
</body>

</html>