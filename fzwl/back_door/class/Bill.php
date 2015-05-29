<?PHP 
Class Bill
{
	public $id;
	public $billNo;
	public $remark;
	public $addTime; 
	var $conn;

    function __construct() {
		$this->conn = mysqli_connect("localhost", "root", "888888", "fzwl"); 
		mysqli_query($this->conn, "SET NAMES utf-8");
	}
		
	function __destruct() {
		mysqli_close($this->conn);
    }

	function getBillInfo($id)
	{
		$sql="SELECT * FROM bill WHERE id=".$id;
		$results = $this->conn->query($sql);
		return $results;
	} 

	function getBillList()
	{
		$sql="SELECT * FROM bill Order By add_time DESC";
		$results = $this->conn->query($sql);
		return $results;
	} 

	function insertBill()
	{
		$strSql="Insert Into bill (bill_no, remark, add_time) Values('" . $this->billNo . "','" . $this->remark . "','" . $this->addTime . "')";
		$this->conn->query($strSql);
	}
	
	function updateBill($id)
	{
		$strSql="Update bill Set bill_no='" . $this->billNo . "',remark='" . $this->remark . "' Where id=" . $id;
		$this->conn->query($strSql);
	} 

	function deleteBill($id)
	{
		$strSql="Delete From bill Where id=" . $id;
		$this->conn->query($strSql);
	} 
}
?>
