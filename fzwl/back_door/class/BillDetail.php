<?PHP
Class BillDetail {
	public $id;
	public $billNo;
	public $arriveAddress;
	public $arriveTime;
	public $remark;
	public $sort;
	var $conn;

	function __construct() {
		$this->conn = mysqli_connect("localhost", "root", "888888", "fzwl");
		mysqli_query($this->conn, "SET NAMES utf-8");
	}

	function __destruct() {
		mysqli_close($this->conn);
	}

	function getBillDetailInfo($id) {
		$sql = "SELECT * FROM bill_detail WHERE id=" . $id;
		$results = $this->conn->query($sql);
		return $results;
	}

	function getBillDetailList($billNo) {
		$sql = "SELECT * FROM bill_detail where bill_no='" . $billNo . "' Order By sort";
		$results = $this->conn->query($sql);
		return $results;
	}

	function insertBillDetail() {
		$strSql = "Insert Into bill_detail (bill_no,arrive_address,arrive_time,remark,sort) Values('" . $this->billNo . "','" . $this->arriveAddress . "','" . $this->arriveTime . "','" . $this->remark . "','" . $this->sort . "')";
		$this->conn->query($strSql);
	}

	function updateBillDetail($id) {
		$strSql = "Update bill_detail Set arrive_address='" . $this->arriveAddress . "',arrive_time='" . $this->arriveTime ."',remark='" . $this->remark . "' Where id=" . $id;
		$this->conn->query($strSql);
	}

	function deleteBillDetail($id) {
		$strSql = "Delete From bill_detail Where id=" . $id;
		$this->conn->query($strSql);
	}
	
	function queryMaxSort($billNo){
		$sql = "SELECT count(*) FROM bill_detail where bill_no='" . $billNo;
		$results = $this->conn->query($sql)+1;
		return $results;
	}
}
?>
