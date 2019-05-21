<?php
session_start();
include 'database-connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
  $user = $db->query('SELECT username, password FROM user_account WHERE username = $_POST["username"]');
  if (password_verify($_POST['password'], $user['password'])) {
    loginSuccess();
  } else {
    loginFailed();
  }
} else {
  loginFailed();
}

function loginSuccess() {
  echo 'success!';
  header('Location: home.php');
  die();
}

function loginFailed() {
  echo 'failed!';
  header('Location: login-screen.php');
  die();
}
