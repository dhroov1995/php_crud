<?php
error_reporting(0);
define ("TABLE_PREFIX", "tbl_");  

define ("PAGINATION","15");  
define ("RANGE","3");  

define ("SITE_URL","https://web.prlworld.com/");
define ("SITE_TITLE","Demo Crud");
define ("FROM_MAIL","info@localhost.com");
define ("TO_MAIL","demo@gmail.com");

$dirname=str_replace("/include","/",dirname(__FILE__)); 
define('ABSPATH',$dirname);  


 
class DbConfig 
{     
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'projects';  

    protected $connection;
    
    public function __construct()
    {
        if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->connection;
    }

}


?>