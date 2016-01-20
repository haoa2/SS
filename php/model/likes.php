<?php
    require_once 'bin/OOM.php';
    
    class like extends OOM{
        function __construct(){
            $this->model_name = "likes";
        }
    }

?>