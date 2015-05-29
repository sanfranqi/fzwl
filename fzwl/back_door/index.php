<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<title>index</title>
</head>
<body>
<?php
	echo("hello world!");
?>
<input style="font-size:15" type="button" value="add bill" onclick="addBill('AddBill.php')" name=add>
<?PHP
	include('/class/Bill.php');
	$bill = new Bill();
	$results = $bill->getBillList();
	$exist = false;

?>
<table align=center border="1" cellspacing="0" width="35%" bordercolorlight="#808000" bordercolordark="#FFFFFF">
  <tr>
   <td width="30%" align="center" bgcolor="#FF4500"><font size="4"><strong>id</strong></font></td>
   <td  align="center" bgcolor="#FF4500"><font size="4"><strong>billNo</strong></font></td>
   <td  align="center" bgcolor="#FF4500"><font size="4"><strong>remark</strong></font></td>
   <td  width="30%" align="center" bgcolor="#FF4500"><font size="4"><strong>addTime</strong></font></td>
   <td width="10%" align="center"  bgcolor="#FF4500"><font size="4"><strong>edit</strong></font></td>
   <td width="10%" align="center"  bgcolor="#FF4500"><font size="4"><strong>delete</strong></font></td>
  </tr>
<?php 
	//循环显示记录
	while($row = $results->fetch_row())  {
		$exist = true;
?>
  <tr>
    <td><?php     echo($row[0]); ?></td>
	<td align="center"><?php     echo($row[1]); ?></td>
	<td align="center"><?php     echo($row[2]); ?></td>
	<td align="center"><?php     echo(date('Y-m-d H:i:s',$row[3])); ?></td>
    <td align="center"><a href="BillOP.php?id=<?php     echo($row[0]); ?>" onClick="return news90(this.href)">修改</a></td>
    <td align="center"><a href="BillOP.php?id=<?php     echo($row[0]); ?>" onClick="return newView(this.href)">删除</a></td>
  </tr>
<?php 
	} 
	if (!$exist)
		print "<tr><td colspan=6 align=center>no bill</td></tr></table>";
?>
</table>
</body>
<script language="javascript">
function addBill(url) {
  var oth="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=200";
  oth = oth+",width=600,height=500";
  var addBillWin=window.open(url,"addBill",oth);
  addBillWin.focus();
  return false;
}
</script>
</html>
