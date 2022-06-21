<?php
session_start();
include_once 'DbConfig.php';

class Crud extends DbConfig
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function getRowData($query)
    {        
        $result = $this->connection->query($query);
        if ($result == false) {
            return false;
        } 
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows = $row;
        }
        return $rows;
    }
    
    public function getData($query)
    {        
        $result = $this->connection->query($query);
        
        if ($result == false) {
            return false;
        } 
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }
        
    public function execute($query) 
    {
        $result = $this->connection->query($query);
        
        if ($result == false) { 
            return false;
        } else {
            return true;
        }        
    }
	
	
	public function fnInsert($query) 
    {
        $result = $this->connection->query($query); 
		
        if ($result == false) { 
            return false;
        } else {
           return  $this->connection->insert_id;
        }        
    }
	function insert_data($table,$insert_data){
        global $connection;
    
        $sql_insert = "INSERT INTO `$table` SET ";
        foreach ($insert_data as $key => $value) {
            $sql_insert .= '`' . $key . '`="' . trim($value) . '",';
        } 
        $sql_insert  = trim($sql_insert, ",");
         $sql_insert;
        mysqli_query($conn,$sql_insert);
        //die();
        
    }
	
	
	function insert_product($table,$insert_data){
        global $connection;
    
        $sql_insert = "INSERT INTO `$product` SET ";
        foreach ($insert_product as $key => $value) {
            $sql_insert .= '`' . $key . '`="' . trim($value) . '",';
        } 
        $sql_insert  = trim($sql_insert, ",");
         $sql_insert;
        mysqli_query($conn,$sql_insert);
        //die();
        
    }
	
	
	public function GiveValue($fields,$tablename,$wherecondition,$debug)
    {        
		$strSQL=" select $fields from $tablename $wherecondition";
	
        $result = $this->connection->query($strSQL);
        
        if ($result == false) {
            return false;
        } 
          
         $row = $result->fetch_assoc(); 
         if($row[''.$fields.'']){
			 
			 $img=$row[''.$fields.''];
		 }else{
			 
			 $img='';
		 }
          
        return $img;
    }
	 
	
	function fnErrorLog($errorMessage,$errorSQL)
	{
		
	}
	
    
    public function delete($id, $table) 
    { 
        $query = "DELETE FROM $table WHERE id = $id"; 
        $result = $this->connection->query($query); 
        if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
          
        }
    }
 
    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    } 
	
	public function format_data($value)
    {
        return trim($value);
    }

	function substr($text,$limit){  
		if( strlen($text) > $limit ){ 
			$text=substr($text,0,$limit)."...";
		} 
		return $text;
	}
	   

}
?>