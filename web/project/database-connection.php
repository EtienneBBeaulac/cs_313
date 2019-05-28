<?php
try {
  $dbUrl;
  $dbOpts;
  $dbHost;
  $dbPort;
  $dbUser;
  $dbPassword;
  $dbName;
  if (null != getenv('DATABASE_URL') && '' != getenv('DATABASE_URL')) {
    $dbUrl = getenv('DATABASE_URL');
  } else {
    require 'env.php';
    $dbUrl = getDbUrl();
  }

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"], '/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
  echo 'Error!: ' . $ex->getMessage();
  die();
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
