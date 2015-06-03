<?php include('DBConnector.php');?>
<?PHP 
Class User
{
	public $username;
	public $password;
	
	

	function login()
	{
		$conn = new DBConnector();
		$this->password=md5($this->password);
		$sql="SELECT * FROM user WHERE username='".$this->username."' and password='".$this->password."'";
		$results = $conn->conn->query($sql);
		return $results;
	} 

}
?>
