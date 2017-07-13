<?php
class Database{
	private $conn ;
	function __construct(){
		$this->conn = new  mysqli(DB_HOST,DB_USER,DB_PASSWORD,DATA);
		
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		} 
		mysqli_set_charset($this->conn,"utf8");
	}
	function __destruct() {
		$this->conn->close();
	}
	
	public function Thucthi($sql){
		$query = $this->conn->query($sql);
		return $query;
	}
	// Chong sql injection
	public function real_escape_string($string) {
   		// todo: make sure your connection is active etc.
    	return $this->conn->real_escape_string($string);
  }
}
?>