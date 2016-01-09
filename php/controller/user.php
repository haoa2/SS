<?php
    require_once '../model/user.php';
    require_once '../model/bin/logger.php';
    session_start();
    
    $Logger = new Logger();
    
    
    switch ($_POST['action']) {
        case 'new':
            new_user();
            break;
        
        case 'log_in':
            log_in();
            break;
        
        case 'data':
            if(isset($_SESSION['user'])){
                echo json_encode(unserialize($_SESSION['user'])->attr);
            }else{
                echo '{"status": "Error", "description": "Couln\'t find any user with those characteristics."}';
            }
            break;
        default:
            # code...
            break;
    }
    
    
    
    
    
    
    
    
    
    
    function new_user(){
        $n_user = new User();
        $n_user->attr["username"] = $_POST['username'];
        $n_user->attr["pw"] = md5($_POST['password']);
        $n_user->save();
        echo var_export($n_user);
    }
    
    function log_in(){
        $U = new User();
        $query = "username = '".$_POST['username']."' AND pw = '".md5($_POST['password'])."'";
        echo var_dump($U);
        $r = $U->where($query);
        if(count($r) != 0){
            $_SESSION['user'] = serialize($r[0]);  
            echo json_encode($_SESSION['user']);              
        }else{
            echo '{"status": "Error", "description": "Couln\'t find any user with those characteristics."}';
        }
    }
?>