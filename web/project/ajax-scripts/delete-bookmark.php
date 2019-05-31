<?php
require '../database-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bm_id = $_POST['bm_id'];

  $sql = "DELETE FROM user_bookmark WHERE id={$bm_id}";
  if ($db->exec($sql) !== false) {
    echo json_encode(['status' => 'success']);
  } else {
    echo json_encode(['status' => 'failure']);
  }
}
