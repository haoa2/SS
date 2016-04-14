<?php
	session_start();

	require_once '../model/likes.php';
	require_once '../model/user.php';
    require_once '../model/bin/logger.php';

    $Like = new Like();
    $Logger = new Logger();
    
    if(isset($_SESSION['user'])){
        $user =  unserialize($_SESSION['user']);
    }else{
    	$user_ = new User();
    	$user = $user_->find($_POST["user_id"]);
    }

    $action = (isset($_GET['action'])) ? $_GET['action'] : $_POST['action'];

    switch ($action) {

        case 'new':
        	$Logger->log("Likes::new ".var_export($_POST, true)."   ***    ".var_export($user, true));
        	$r = $Like->where("secret_id = ".$_POST['secret_id']." and user_id = ".$user->attr['id']."");
        	$Logger->log($r);
        	if (count($r) == 0) {
        		if(new_like($_POST['secret_id'], $user->attr['id'])){
        			echo '{"status": "Liked", "description": "Succesfully liked."}';
        		}else{
        			echo '{"status": "Error", "description": "Couln\'t find any session."}';
        		}
        	}else{
        		dislike($_POST['secret_id'], $user->attr['id']);
                echo '{"status": "Disliked", "description": "Succesfully liked."}';
        	}
            break;
            
        case 'get':
            $r = $Like->find_by("secret_id", $_POST['secret_id'], false);
            $Logger->log("Likes::get POST =>". var_export($_POST, true));
            $Logger->log($r);
            echo json_encode($r);
            break;

        default: 
            // $r->logger->log("TEST");
            break;
    }

    function new_like($secret_id, $user_id){
    	$l = new Like();
    	$l->attr["secret_id"] = $secret_id;
    	$l->attr["user_id"] = $user_id;
    	return $l->save(true);
    }
    function dislike($secret_id, $user_id){
    	$l_ = new Like();
    	$l = $l_->where("secret_id = $secret_id and user_id = $user_id");
    	$l[0]->drop();
    	return 1;
    }
    
?>