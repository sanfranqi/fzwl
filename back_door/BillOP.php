<?php include("IS_LOGIN.php");?>
<?PHP include('../back_door/class/Bill.php'); ?>
<?PHP
	$bill = new Bill();
	$StrAction=$_POST["action"];
	$billNo=trim($_POST["billNo"]);
	$remark=trim($_POST["remark"]);
	$addTime=trim($_POST["addTime"]);
	$addTime=strtotime($addTime);
	$bill->billNo=$billNo;
	$bill->remark=$remark;
	$bill->addTime=$addTime;
	if ($StrAction=="add")  {
		$bill->insertBill();
	}
	else if($StrAction=="update")  {
		$id=$_POST["id"];
		$bill->updateBill($id);
	}
	else if($StrAction=="delete")  {
		$id=$_POST["id"];
		$bill->deleteBill($id);
	}
	else if($StrAction=="get"){
		$id=$_POST["id"];
		$bill = $bill->getBillInfo($id);
// 		$row = mysql_fetch_array($result);
// 		$row = $results->fetch_row();
// 		$row=mysql_fetch_row($results,MYSQL_ASSOC);
// 		if( $row = $results->fetch_row () ) {
// 			return $row[0];
// 		}
// 		print $arr;
		header('text/plain; charset=utf-8');
		$arr = json_encode(array("id"=>1));
		echo urldecode($arr);
	}
	else{
		
	} 
	
?>
