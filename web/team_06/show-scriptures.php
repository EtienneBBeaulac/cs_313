<?php
$stmt = $db->prepare('SELECT s.id, s.book, s.chapter, s.verse, s.content, t.name FROM other.scripture s JOIN other.scripture_topic st ON s.id=st.scripture_id JOIN other.topic t ON t.id=st.topic_id');
$stmt->execute();
$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dict = [];
foreach ($scriptures as $s) {
  if (isset($dict[$s['id']])) {
    array_push($dict[$s['id']]['name'], $s['name']);
  } else {
    $dict[$s['id']] = $s;
    $dict[$s['id']]['name'] = array($dict[$s['id']]['name']);
  }
}
foreach ($dict as $s) {
  require 'single-scripture.php';
}

