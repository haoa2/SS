<?php
    require_once 'bin/OOM.php';
    
    class comment extends OOM{
        function __construct(){
            $this->model_name = "comment";
        }
    }

?>