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
		$results = $conn->conn->query($sql);
		$row = $results->fetch_row();
		$this->id=$row[0];
		$this->billNo=$row[1];
		$this->remark=$row[2];
		$this->addTime=$row[3];
		return $this;
	} 

	function getBillList()
	{
		$conn = new DBConnector();
		$sql="SELECT * FROM bill Order By id DESC";
		$results = $conn->conn->query($sql);
		return $results;
	} 

	function insertBill()
	{
		$conn = new DBConnector();
		$strSql="Insert Into bill (bill_no, remark, add_time) Values('" . $this->billNo . "','" . $this->remark . "','" . $this->addTime . "')";
		$results = $conn->conn->query($strSql);
		return $results;
	}
	
	function updateBill($id)
	{
		$conn = new DBConnector();
		$strSql="Update bill Set bill_no='" . $this->billNo . "',remark='" . $this->remark . "' Where id=" . $id;
		$conn->conn->query($strSql);
	} 

	function deleteBill($id)
	{
		$conn = new DBConnector();
		$strSql="Delete From bill Where id=" . $id;
		$conn->conn->query($strSql);
	} 
}
?>
