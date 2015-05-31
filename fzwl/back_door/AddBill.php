<html>
<head>
<title>addbill</title>
<script language="javascript">
function checkFields() {
  if (myform.billNo.value=="") {
    alert("billNo no empty");
    myform.billNo.focus;
    return false;
  }
  return true;
}
</script>
</head>
<body bgcolor="#f5deb3">
<form name="myform" method="POST" action="BillOP.php?action=add" OnSubmit="return checkFields()">
        <table border="0" width="100%" cellspacing="1">
          <tr>
            <td width="100%"><font size="4"><b>billNo</b></font> 
            <input style="font-size:15" type="text" name="billNo" size="27"></td>
          </tr>
          <tr>
            <td width="100%"><font size="4"><b>remark</b></font> 
            <input style="font-size:15" type="text" name="remark" size="27"></td>
          </tr>
        </table>
        <p align="center">
        <input style="font-size:15" type="submit" value="add" name="B1">
        <input style="font-size:15" type="reset" value="reset" name="B2">
        <a style="color:blue; TEXT-DECORATION: none" href="javascript:window.close()"><input style="font-size:15" type="button" value="close"></input></a>
        </p>
      </form>
</body>
</html>
<table cellpadding="0" cellspacing="0" border="0"
									class="table table-striped table-bordered" id="page_table">
									<thead>
										<tr>
											<th>到达地点</th>
											<th>到达日期</th>
											<th>备注</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody>
                                         <?PHP
											include ('/class/BillDetail.php');
											$billDetail = new BillDetail();
											$results_detail = $billDetail->getBillDetailList ($billNo);
											$exist_detail = false;
											// 循环显示记录
											while ( $row = $results_detail->fetch_row () ) {
												$exist_detail = true;
										 ?>
										<tr class="odd gradeX">
											<td><?php echo($row[2]); ?></td>
											<td><?php echo(date('Y-m-d',$row[3])); ?></td>
											<td><?php echo($row[4]); ?></td>
											<td align="center">
												<a href="#">
													<button id="edit_detail_btn" class="btn btn-success edit_detail_btn" data-id="<?php echo($row[0]);?>" data-billNo="<?php echo($row[1]);?>" data-arriveAddress="<?php echo($row[2]);?>" data-arriveTime="<?php echo(date('Y-m-d',$row[3]));?>" data-remark="<?php echo($row[4]);?>">更新</button>
												</a>
												&nbsp;&nbsp;&nbsp;&nbsp;
												<a href="#">
													<button id="delete_detail_btn" class="btn btn-success delete_detail_btn" data-id="<?php echo($row[0]);?>">删除</button>
												</a>
											</td>
										</tr>
                                            <?php
												}												
											 ?>
                                      </tbody>
								</table>