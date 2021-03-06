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
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  include 'database-connection.php';
  $stmt = $db->prepare('SELECT id, book, chapter, verse, content FROM other.scripture');
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rows as $item) {
    echo "<a href='view-scripture.php?bookId={$item["id"]}'><b>{$item['book']} {$item['chapter']}:{$item['verse']}</b></a><br>";
  }
  ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Enter a book name: <input type="text" name="book" id="bookSearch">
    <button type="submit">Search</button><br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['book'])) {
        $book = test_input($_POST['book']);
        $stmt = $db->prepare('SELECT id, book, chapter, verse, content FROM other.scripture WHERE book=:book');
        $stmt->execute(array(':book' => $book));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $item) {
          echo "<b>{$item['book']} {$item['chapter']}:{$item['verse']}</b> - {$item['content']}<br>";
        }
      }
    }
    ?>
  </form>
</body>

</html>