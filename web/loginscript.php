<?php
    if (isset($_POST['sessiontype']) && ($_POST['sessiontype'] == 'admin' || $_POST['sessiontype'] == 'tester')) {
        $_SESSION['sessiontype'] = $_POST['sessiontype'];
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('success' => 0));
    }
?>