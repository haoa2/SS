<?php
    class Logger{
        public $ENV = "development";
        public $PATH = "";
        
        function __construct($P_env = "development", $time_zone='America/Mexico_City'){
            date_default_timezone_set($time_zone);
            $this->ENV = $P_env;
        }
        
        function get_date(){
            return date('l jS \of F Y h:i:s A');
        }
        
        function get_file_name(){
            return $this->PATH.$this->ENV."_log.txt";
        }
        
        function log($log){
            $actual = file_get_contents($this->get_file_name());
            $actual .= "[".$this->get_date()."]: \t ".$log."\n------------------------------------\n";
            file_put_contents($this->get_file_name(), $actual);
        }
        
    }
    $Logger = new Logger();
?>