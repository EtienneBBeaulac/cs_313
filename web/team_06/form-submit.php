<?php
session_start();
require '../project/database-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $book = test_input($_POST['book']);
  $chapter = test_input($_POST['chapter']);
  $verse = test_input($_POST['verse']);
  $content = test_input($_POST['content']);
  $topicIds = $_POST['topics'];
  $newTopicValue;
  if (isset($_POST['new_topic'])) {
    $newTopicValue = $_POST['new_topic_value'];
    $sql_insert = "INSERT INTO other.topic (name) VALUES ('{$newTopicValue}')";
    if ($db->exec($sql_insert) !== false) {
      $newId = $db->lastInsertId('other.topic_id_seq');
      array_push($topicIds, $newId);
    }
  }

  $sql_insert = "INSERT INTO other.scripture (book, chapter, verse, content) VALUES ('{$book}', {$chapter}, {$verse}, '{$content}')";
  if ($db->exec($sql_insert) !== false) {
    $newId = $db->lastInsertId('other.scripture_id_seq');
    foreach ($topicIds as $topic_id) {
      $sql_insert = "INSERT INTO other.scripture_topic (scripture_id, topic_id) VALUES ({$newId}, {$topic_id})";
      $db->exec($sql_insert);
    }
  }
}

$stmt = $db->prepare('SELECT s.id, s.book, s.chapter, s.verse, s.content, t.name FROM other.scripture s JOIN other.scripture_topic st ON s.id=st.scripture_id JOIN other.topic t ON t.id=st.topic_id');
$stmt->execute();
$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $scriptures = [
//     ['id' => 1, 'book' => 'ssss', 'chapter' => 1, 'verse' => 1, 'content' => 'sssss', 'name' => 'Charity'],
//     ['id' => 2, 'book' => 'aa', 'chapter' => 2, 'verse' => 2, 'content' => 'aa', 'name' => 'Charity'],
//     ['id' => 3, 'book' => 'adfwev', 'chapter' => 3, 'verse' => 3, 'content' => 'adfwec', 'name' => 'Charity'],
//     ['id' => 3, 'book' => 'adfwev', 'chapter' => 3, 'verse' => 3, 'content' => 'adfwec', 'name' => 'Sacrifice'],
// ];
// $dict = [];

// for ($x = 0; $x < count($scriptures); $x++) {
//     if (isset($dict[$x])) {

//     }
// }
// foreach ($scriptures as $s) {
//     $res = array_filter($dict, function($val) use ($s) {
//         return ($val['id'] == $s['id']);
//     });
//     if (count($res) > 0) {
        
//     }
// }

// $dict = array_filter($scriptures, "removeDupes");
//   if (isset($dict[$s['id']])) {
//     array_push($dict[$s['id']]['name'], $s['name']);
//   } else {
//     $dict[$s['id']] = $s;
//     $dict[$s['id']]['name'] = array($dict[$s['id']]['name']);
//   }
// }

$stmt = $db->prepare('SELECT id, name FROM other.topic');
$stmt->execute();
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);

$response = ['topics' => $topics, 'scriptures' => $scriptures];

echo json_encode($response);