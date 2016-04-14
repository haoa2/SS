<?php
    session_start();
    require_once '../model/user.php';
    require_once '../model/bin/logger.php';
    
    $Logger = new Logger();
    
    
    switch ($_POST['action']) {
        case 'new':
            new_user();
            break;
        
        case 'log_in':
            log_in();
            break;
        
        case 'log_out':
            session_destroy();
            break;

        case 'drop':
            drop_user();
            break;

        case 'data':
            if(isset($_SESSION['user'])){
                echo json_encode(unserialize($_SESSION['user'])->attr);
            }else{
                echo '{"status": "Error", "description": "Couln\'t find any session."}';
            }
            break;
        
        default:
            echo '{"status": "Error", "description": "There\'s no action to do."}';
            break;
    }
    
    
    
    
    
    
    
    
    
    
    function new_user(){
        $n_user = new User();
        $n_user->attr["username"] = $_POST['username'];
        $n_user->attr["pw"] = md5($_POST['password']);
        if($n_user->save()){
            echo json_encode((array) $n_user->attr);
        }else{
            echo '{"status": "Error", "description": "Couln\'t create that user."}';
        }
    }
    
    function log_in(){
        $U = new User();
        $query = "username = '".$_POST['username']."' AND pw = '".md5($_POST['password'])."'";
        $r = $U->where($query);
        if(count($r) != 0){
            $_SESSION['user'] = serialize($r[0]);  
            echo json_encode((array) $r[0] );              
        }else{
            echo '{"status": "Error", "description": "Couln\'t find any user with those characteristics."}';
        }
    }

    function drop_user(){
        $d_u =  new User();
        $r = $d_u->find_by("username", $_POST['username']);
        if(count($r) > 0){
            echo json_encode($r[0]->attr);
            $r[0]->drop();
        }else{
            echo '{"status": "Error", "description": "Couln\'t find any user with an username equals to '.$_POST['username'].'"}';
        }
    }
?>