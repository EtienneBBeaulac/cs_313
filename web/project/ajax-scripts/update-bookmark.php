<?php
require '../database-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bm_name = test_input($_POST['bm_name']);
  $bm_url = test_input($_POST['bm_url']);
  $bm_id = $_POST['bm_id'];

  $sql = "UPDATE user_bookmark SET bookmark_name='{$bm_name}', bookmark_url='{$bm_url}' WHERE id={$bm_id}";
  if ($db->exec($sql) !== false) {
    echo json_encode(['status' => 'success', 'data' => ['id' => $bm_id, 'bookmark_name' => $bm_name, 'bookmark_url' => $bm_url]]);
  } else {
    echo json_encode(['status' => 'failure']);
  }
}
