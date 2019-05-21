<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Team 05</title>
</head>

<body>
  <h1>Scripture Resources</h1>
<?php 
include 'database-connection.php';
foreach ($db->query('SELECT book, chapter, verse, content FROM other.scripture') as $item) {
  echo "{$item['book']} {$item['chapter']}:{$item['verse']} - {$item['content']}<br>";
}
?>

</body>

</html>