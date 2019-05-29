<?php
session_start();
require '../project/database-connection.php';
$stmt = $db->prepare('SELECT id, name FROM other.topic');
$stmt->execute();
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Team 06</title>
</head>

<body>
  <form>
    <label for="book">Book: </label><br>
    <input type="text" name="book" id="book" required><br> <br>
    <label for="chapter">Chapter: </label><br>
    <input type="text" name="chapter" id="chapter" required><br><br>
    <label for="verse">Verse: </label><br>
    <input type="text" name="verse" id="verse" required><br><br>
    <label for="content">Content: </label><br>
    <textarea name="content" id="content" cols="30" rows="10" required></textarea><br><br>


    <div>Topics: </div>
    <div id="topics">
      <?php
      foreach ($topics as $topic) {
        require 'topic-checkbox.php';
      }
      ?>
    </div>
    <input type="checkbox" name="new_topic" id="new_topic"> <input type="text" name="new_topic_value" id="new_topic_value">
    <br><br><button type="submit">Insert</button><br><br>
  </form>
  <div id="scriptures">
    <?php
    foreach ($dict as $s) {
      require 'single-scripture.php';
    }
    ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script>
    var toType = function(obj) {
      return ({}).toString.call(obj).match(/\s([a-zA-Z]+)/)[1].toLowerCase()
    }
    $(function() {
      $('form').on('submit', function(e) {
        console.log($('form').serialize());
        e.preventDefault();
        $.post('form-submit.php', $('form').serialize(), function(response) {
          let parsed = jQuery.parseJSON(response);
          $('#topics').empty();
          parsed.topics.forEach(function(topic) {
            let name = $.trim(topic['name']);
            let id = $.trim(topic['id']);

            let element = '<input type="checkbox" name="topics[' + name + ']" id="' + id + '" value="' + id + '"> ' + name;
            $('#topics').append(element);
          });

          $('#scriptures').empty();
          console.log(toType(parsed.scriptures));
          parsed.scriptures.forEach(function(scripture) {
            let id = $.trim(scripture['id']);
            let book = $.trim(scripture['book']);
            let chapter = $.trim(scripture['chapter']);
            let verse = $.trim(scripture['verse']);
            let content = $.trim(scripture['content']);
            let topic = $.trim(scripture['name']);
            if ($('#' + id).length === 0) {
              let element = '<div id="' + id + '">' + book + ' ' + chapter + ':' + verse + ' - ' + content + ' (<span id="topics_' + id + '">' + topic + '</span>)</div>';
              $('#scriptures').append(element);
            } else {
              $('#topics_' + id).append(', ' + topic);
            }
          });
        });
      });
    });
  </script>
</body>

</html>