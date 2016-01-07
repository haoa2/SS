<?php
    require_once 'bin/OOM.php';
    
    class user extends OOM{
        function __construct(){
            $this->model_name = "user";
            $this->before_save = "before_save";
        }
        
        function before_save(){
            $u =  new User();
            $r = $u->find_by("username", $this->attr["pw"]);
            if (strlen($this->attr["pw"]) > 7 && count($r) != 0) {
                return true;
            }else{
                return false;
            }
        }
    }

?>