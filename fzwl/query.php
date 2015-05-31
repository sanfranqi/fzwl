<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>物流查询</title>
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top:5%;margin-left:40%;">
			<?php $billNo=$_GET["billNo"];?>
			<div class="row">
				<form class="form-inline" method="get" action="query.php">
					<div class="form-group">
						<label for="sn">运单号：</label>
						<input type="text" class="form-control" id="billNo" name="billNo" style="font-size:16px;" placeholder="请输入10位运单号" value="<?php echo($billNo);?>"/>
					</div>
					<button type="submit" class="btn btn-primary">查&nbsp;&nbsp;询</button>	
				</form>
			</div>
			<div class="row" style="margin-top:30px">	
				<label id="status_info"></label>
			</div>
			<div class="row" style="margin-top:20px">	
				<table id="table_info" class="table table-hover table-striped">
					<thead>
						<tr>
							<th>
								到达地点
							</th>
							<th>
								到达时间
							</th>
							<th>
								备注
							</th>
						</tr>
					</thead>
					<tbody>
						<?PHP
							include ('/back_door/class/BillDetail.php');
							$billDetail = new BillDetail();
							$results_detail = $billDetail->getBillDetailList ($billNo);
							$exist_detail = false;
							// 循环显示记录
							while ( $row = $results_detail->fetch_row () ) {
								$exist_detail = true;
						 ?>
						<tr>
							<td><?php echo($row[2]); ?></td>
							<td><?php echo(date('Y-m-d',$row[3])); ?></td>
							<td><?php echo($row[4]); ?></td>
						</tr>
                          <?php
								}												
							 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div  id="warn_div" class="alert alert-danger" role="alert" style="display:none">
		<strong>Error!</strong>&nbsp;&nbsp;&nbsp;&nbsp;<label id="warn_area"></label>
	</div>
</body>
</html>