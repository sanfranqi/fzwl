<?php include('DBConnector.php');?>
<?PHP
Class BillDetail {
	public $id;
	public $billNo;
	public $arriveAddress;
	public $arriveTime;
	public $remark;
	public $sort;
	
	function __construct() {
	}

	function getBillDetailInfo($id) {
		$conn = new DBConnector();
		$sql = "SELECT * FROM bill_detail WHERE id=" . $id;
		$results = mysql_query($sql);
		$conn->__destruct();
		return $results;
	}

	function getBillDetailList($billNo) {
		$conn = new DBConnector();
		$sql = "SELECT * FROM bill_detail where bill_no='" . $billNo . "' Order By arrive_time desc";
		$results = mysql_query($sql);
		$conn->__destruct();
		return $results;
	}

	function insertBillDetail() {
		$conn = new DBConnector();
		$strSql = "Insert Into bill_detail (bill_no,arrive_address,arrive_time,remark,sort) Values('" . $this->billNo . "','" . $this->arriveAddress . "','" . $this->arriveTime . "','" . $this->remark . "','" . $this->sort . "')";
		mysql_query($strSql);
		$conn->__destruct();
	}

	function updateBillDetail($id) {
		$conn = new DBConnector();
		$strSql = "Update bill_detail Set arrive_address='" . $this->arriveAddress . "',arrive_time='" . $this->arriveTime ."',remark='" . $this->remark . "' Where id=" . $id;
		mysql_query($strSql);
		$conn->__destruct();
	}

	function deleteBillDetail($id) {
		$conn = new DBConnector();
		$strSql = "Delete From bill_detail Where id=" . $id;
		mysql_query($strSql);
		$conn->__destruct();
	}
	
	function queryMaxSort($billNo){
		$conn = new DBConnector();
		$sql = "SELECT count(*) FROM bill_detail where bill_no='" . $billNo;
		$results = mysql_query($sql)+1;
		$conn->__destruct();
		return $results;
	}
}
?>
