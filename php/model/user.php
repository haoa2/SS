<?php
    require_once 'bin/OOM.php';
    
    class user extends OOM{
        function __construct(){
            $this->model_name = "user";
            $this->before_save = "before_save";
        }
        
        function before_save(){
            $u =  new User();
            $Logger = new Logger();
            if (!isset($this->attr["username"])|| !isset($this->attr["pw"])) {
                return false;
            }
            $r = $u->find_by("username", $this->attr["username"]);
            if (count($r) == 0) {
                return true;
            }else{
                return false;
            }
        }
    }

?>