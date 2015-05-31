<?php include('DBConnector.php');?>
<?PHP
Class BillDetail {
	public $id;
	public $billNo;
	public $arriveAddress;
	public $arriveTime;
	public $remark;
	public $sort;

	function getBillDetailInfo($id) {
		$conn = new DBConnector();
		$sql = "SELECT * FROM bill_detail WHERE id=" . $id;
		$results = $conn->conn->query($sql);
		return $results;
	}

	function getBillDetailList($billNo) {
		$conn = new DBConnector();
		$sql = "SELECT * FROM bill_detail where bill_no='" . $billNo . "' Order By id desc";
		$results = $conn->conn->query($sql);
		return $results;
	}

	function insertBillDetail() {
		$conn = new DBConnector();
		$strSql = "Insert Into bill_detail (bill_no,arrive_address,arrive_time,remark,sort) Values('" . $this->billNo . "','" . $this->arriveAddress . "','" . $this->arriveTime . "','" . $this->remark . "','" . $this->sort . "')";
		$conn->conn->query($strSql);
	}

	function updateBillDetail($id) {
		$conn = new DBConnector();
		$strSql = "Update bill_detail Set arrive_address='" . $this->arriveAddress . "',arrive_time='" . $this->arriveTime ."',remark='" . $this->remark . "' Where id=" . $id;
		$conn->conn->query($strSql);
	}

	function deleteBillDetail($id) {
		$conn = new DBConnector();
		$strSql = "Delete From bill_detail Where id=" . $id;
		$conn->conn->query($strSql);
	}
	
	function queryMaxSort($billNo){
		$conn = new DBConnector();
		$sql = "SELECT count(*) FROM bill_detail where bill_no='" . $billNo;
		$results = $conn->conn->query($sql)+1;
		return $results;
	}
}
?>
