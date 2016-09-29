<?php
//this page will serve database related services


class _con{
	private $_con;
	
	function __construct(){
		$this->_con = mysqli_connect('localhost','root','toor','h_rent');
	}
	
	function __destruct(){
		$this->_con->close();
	}
	
	
	public function exeQuery($query){
    
    $resultset =  $this->_con->query($query);
    if(!$resultset){
    	die(mysqli_error($this->_con));
    }
    return $resultset;
}
	
}
