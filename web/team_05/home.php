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
  echo "<b>{$item['book']} {$item['chapter']}:{$item['verse']}</b> - {$item['content']}<br>";
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Enter a book name: <input type="text" name="book" id="bookSearch">
<button type="submit">Search</button><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "first if";
  if (isset($_POST['book'])) {
    echo "second if";
    echo "{$_POST['book']}";
  foreach ($db->query("SELECT book, chapter, verse, content FROM other.scripture WHERE book = "."'".$_POST['book']."';") as $item) {
      echo "<b>{$item['book']} {$item['chapter']}:{$item['verse']}</b> - {$item['content']}<br>";
    }
  }
}
?>
</form>
</body>

</html>