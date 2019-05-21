<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Scripture</title>
</head>

<body>
  <?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  include 'database-connection.php';
  if (isset($_GET['bookId'])) {
    $bookId = test_input($_GET['bookId']);
    $stmt = $db->prepare('SELECT * FROM other.scripture WHERE id=:id');
    $stmt->execute(array(':id' => $bookId));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $item) {
      echo "{$item['book']} {$item['chapter']}:{$item['verse']} - {$item['content']}";
    }
  }
  ?>
</body>

</html>