<?php include('DBConnector.php');?>
<?PHP 
Class Bill
{
	public $id;
	public $billNo;
	public $remark;
	public $addTime;

	function getBillInfo($id)
	{
		$conn = new DBConnector();
		$sql="SELECT * FROM bill WHERE id=".$id;
		$results = mysql_query($sql);
		$conn->__destruct();
		$row = mysql_fetch_array($results);
		$this->id=$row[0];
		$this->billNo=$row[1];
		$this->remark=$row[2];
		$this->addTime=$row[3];
		return $this;
	}

	function __construct() {
	}

	function getBillList()
	{
		$conn = new DBConnector();
		$sql="SELECT * FROM bill Order By id DESC";
		$results = mysql_query($sql);
		$conn->__destruct();
		return $results;
	} 

	function insertBill()
	{
		$conn = new DBConnector();
		$strSql="Insert Into bill (bill_no, remark, add_time) Values('" . $this->billNo . "','" . $this->remark . "','" . $this->addTime . "')";
		$results = mysql_query($strSql);
		$conn->__destruct();
		return $results;
	}
	
	function updateBill($id)
	{
		$conn = new DBConnector();
		$strSql="Update bill Set bill_no='" . $this->billNo . "',add_time='".$this->addTime."',remark='" . $this->remark . "' Where id=" . $id;
		mysql_query($strSql);
		$conn->__destruct();
	} 

	function deleteBill($id)
	{
		$conn = new DBConnector();
		$strSql="Delete From bill Where id=" . $id;
		mysql_query($strSql);
		$conn->__destruct();
	} 
}
?>
