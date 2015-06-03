<?php include("IS_LOGIN.php");?>
<?PHP include('/class/BillDetail.php'); ?>
<?PHP
	$billDetail = new BillDetail();
	$StrAction=$_POST["action"];
	$billNo=trim($_POST["billNo"]);
	$arriveAddress=trim($_POST["arriveAddress"]);
	$arriveTime=trim($_POST["arriveTime"]);
	$arriveTime=strtotime($arriveTime);
	$remark=trim($_POST["remark"]);
	$billDetail->billNo=$billNo;
	$billDetail->arriveAddress=$arriveAddress;
	$billDetail->arriveTime=$arriveTime;
	$billDetail->remark=$remark;
	if ($StrAction=="add")  {
		$billDetail->insertBillDetail();
	}
	else if($StrAction=="update")  {
		$id=$_POST["id"];
		$billDetail->updateBillDetail($id);
	}
	else if($StrAction=="delete")  {
		$id=$_POST["id"];
		$billDetail->deleteBillDetail($id);
	}
	else if($StrAction=="get"){
	}
	else{
		
	} 
	
?>
