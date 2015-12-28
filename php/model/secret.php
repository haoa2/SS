<?php
    require_once 'bin/OOM.php';
    require_once 'bin/logger.php';
    
    class secret extends OOM{
        function __construct(){
            $this->model_name = "secret";
            $this->before_save = "before_save";
        }
       function before_save(){
           if(isset($this->attr["content"]) && isset($this->attr["category"]) ){
               return true;
           }
           return false;
       }
    }

?>