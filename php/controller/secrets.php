<?php
	require_once '../model/secret.php';
    require_once '../model/bin/logger.php';
    $Secret = new Secret();
    $action = (isset($_GET['action'])) ? $_GET['action'] : $_POST['action'];
    switch ($action) {
        case 'get':
            $r = $Secret->all();
            echo json_encode($r);
            break;
        case 'new':
            $Secret->attr["content"] = $_POST['content'];
            if(isset($_POST['user_id'])){ $Secret->attr["user_id"] = $_POST['user_id']; }
            $Secret->attr["category"] = $_POST['category'];
            $Secret->save();
            break;
        default: 
            $Logger->log($_GET["c"]);
            // $r->logger->log("TEST");
            break;
    }
?>