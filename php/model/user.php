<?php
    require_once 'bin/OOM.php';
    
    class user extends OOM{
        function __construct(){
            $this->model_name = "user";
            $this->before_save = "say_hi";
        }
        
        function say_hi(){
            echo "Hi";
            return true; 
        }
    }

?>