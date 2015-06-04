<?PHP 
Class DBConnector
{
	var $conn;
	
    function __construct() {
// 		$this->conn = mysqli_connect("localhost", "root", "888888", "fzwl"); 
// 		echo "fffffffffffffff";
		$this->conn = mysql_connect( "hdm106787300.my3w.com", "hdm106787300", "fangzhou888" );
// 		if (!$this->conn) {
// 			echo "链接失败a".mysql_error();
// 			echo "<br />";
// 		}
// 		else {
// 			echo "oka";
// 			echo "<br />";
// 		} 
		mysql_select_db("hdm106787300_db", $this->conn);
// 		mysqli_query($this->conn, "SET NAMES gbk");
	}
		
	function __destruct() {
// 		mysqli_close($this->conn);
		mysql_close($this->conn);
    }
}
?>
