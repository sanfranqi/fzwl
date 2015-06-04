

<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<body>
<?php include('../back_door/class/DBConnector.php');?>
<?php
	echo '11111111111';
	echo "<br />";
?>
<?php
// 	$con = mysql_connect( "hdm106787300.my3w.com", "hdm106787300", "fangzhou888" );
// 	if (!$con) {
// 		echo "链接失败".mysql_error();
// 		echo "<br />";
// 	}
// 	else {
// 		echo "ok";
// 		echo "<br />";
// 		mysql_select_db("hdm106787300_db", $con);
		
// 		$result = mysql_query("SELECT * FROM user");
		
// 		while($row = mysql_fetch_array($result))
// 		{
// 			echo $row[0] . " " . $row['username'];
// 			echo "<br />";
// 		}
// 	}
	
	$conn = new DBConnector();
	if (!$conn->conn) {
		echo "链接失败a".mysql_error();
		echo "<br />";
	}
	else {
		echo "oka";
		echo "<br />";
// 		mysql_select_db("hdm106787300_db", $conn->conn);
		
// 		$results = mysql_query("SELECT * FROM user");
		$sql="SELECT * FROM user";
		$results = mysql_query($sql);
		$conn->__destruct();
		while($rowa = mysql_fetch_array($results))
		{
			echo $rowa[0] . " " . $rowa['username'];
			echo "<br />";
		}
	}
	
	
	
// 	Class Data
// 	{
// 		var $conn;
	
// 		function __construct() {
// 			// 		$this->conn = mysqli_connect("localhost", "root", "888888", "fzwl");
// 			echo "dataaaaa";
// 			// 		$this->conn = mysql_connect( "hdm106787300.my3w.com", "hdm106787300", "fangzhou888" );
// 			// 		if (!$this->conn) {
// 			// 			echo "链接失败a".mysql_error();
// 			// 			echo "<br />";
// 			// 		}
// 			// 		else {
// 			// 			echo "oka";
// 			// 			echo "<br />";
// 			// 		}
// 			// 		mysql_select_db("hdm106787300_db", $this->conn);
// 			// 		mysqli_query($this->conn, "SET NAMES gbk");
// 		}
	
// 		function __destruct() {
// 			// 		mysqli_close($this->conn);
// 			mysql_close($this->conn);
// 		}
// 	}
	
// 	$a = new Data();
// 	$b = new DBConnector();
	
?>
</body>
</html>
