<?PHP 
Class DBConnector
{
	var $conn;

    function __construct() {
		$this->conn = mysqli_connect("localhost", "root", "888888", "fzwl"); 
		mysqli_query($this->conn, "SET NAMES utf-8");
	}
		
	function __destruct() {
		mysqli_close($this->conn);
    }
}
?>
