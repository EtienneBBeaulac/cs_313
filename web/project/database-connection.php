<?php
try {
  $dbUrl;
  $dbOpts;
  $dbHost;
  $dbPort;
  $dbUser;
  $dbPassword;
  $dbName;
  if (null !== getenv('DATABASE_URL') && '' !== getenv('DATABASE_URL')) {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/'); 
  } else {
    require 'env.php';
    $dbHost = getenv('DB_HOST');
    $dbPort = getenv('DB_PORT');
    $dbUser = getenv('DB_USERNAME');
    $dbPassword = getenv('DB_PASSWORD');
    $dbName = getenv('DB_NAME');
  }

    

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
