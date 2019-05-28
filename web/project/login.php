<?php
session_start();
require 'database-connection.php';
echo getenv('DATABASE_URL');

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = test_input($_POST['username']);
  $password = test_input($_POST['password']);

  $stmt = $db->prepare('SELECT * FROM user_account WHERE username=:username');
  $stmt->execute(array(':username' => $username));
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($rows as $user) {
    if (password_verify($password, $user['password'])) {
      loginSuccess($user);
    } else {
      loginFailed();
    }
  }
} else {
  loginFailed();
}

function loginSuccess($user)
{
  echo 'success!';
  $_SESSION['login'] = ['id' => $user['id'], 'username' => $user['username'], 'email' => $user['email']];
  // header('Location: home.php');
  die();
}

function loginFailed()
{
  echo 'failed!';
  // header('Location: logout.php');
  die();
}
