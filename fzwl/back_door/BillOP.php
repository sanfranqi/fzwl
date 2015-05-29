<?PHP include('/class/Bill.php'); ?>
<html>
<head>
<title>billop</title>
</head>
<body>
<?PHP
	$bill = new Bill();
	$StrAction=$_GET["action"];
	$billNo=trim($_POST["billNo"]);
	$remark=trim($_POST["remark"]);
	$bill->billNo=$billNo;
	$bill->remark=$remark;
	if ($StrAction=="add")  {
		$bill->addTime=time();
		$bill->insertBill();
	}
	else  {
		$id=$_GET["id"];
		$bill->updateBill($id);
	} 
	echo("<h3>success</h3>");
?>
</body>
<script language="javascript">
  opener.location.reload();
  setTimeout("window.close()",600);
</script>
</html>
