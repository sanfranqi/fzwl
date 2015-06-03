<?php include("IS_LOGIN.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<title>方舟物流</title>
	<!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<!--/span-->
			<div class="span12" id="content_detail">
				<div class="row-fluid">
					<!-- block -->
					<div class="block">
						<?php $billNo=$_GET["billNo"];?>
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left">运单【<?php echo($billNo);?>】路线列表</div>
						</div>
						<div class="block-content collapse in">
							<div class="span11">
								<div class="table-toolbar">
									<div class="btn-group">
										<a href="#">
											<button class="btn btn-success" id="add_detail_btn" data-id="<?php echo($billNo);?>">添加<i class="icon-plus icon-white"></i></button>
										</a>
									</div>
								</div>
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<footer>
		<p>&copy;方舟物流 2015</p>
		</footer>
	</div>
	<div id="form_modal" class="modal hide fade in" style="display: none;">
		<div class='modal-header'>
			<a class="close" data-dismiss="modal">X</a>
			<h3 id="title">添加</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal">
				<fieldset>
					<input  id="id" name="id" type="hidden" value=""/>
					<input  id="billNo" name="billNo" type="hidden" value=""/>
					<input  id="action" name="action" type="hidden" value="add"/>
                	<div class="control-group">
	                	<label class="control-label" for="focusedInput">到达地点</label>
	                 	<div class="controls">
	        				<input class="input-xlarge focused" id="arriveAddress" name="arriveAddress" type="text" value=""/>
	        			</div>
                   	</div>
                   	<div class="control-group">
                    	<label class="control-label" for="date01">到达日期</label>
                        <div class="controls">
                        	<input type="text" class="input-xlarge date" id="arriveTime" name="arriveTime" value="<?php echo(date('Y-m-d'))?>" readonly="readonly"/>
                        </div>
                    </div>
                    <div class="control-group">
	                	<label class="control-label" for="focusedInput">备注</label>
	                 	<div class="controls">
	        				<input class="input-xlarge focused" id="remark" name="remark" type="text" value=""/>
	        			</div>
                   	</div>
               	</fieldset>
            </form>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-success" id="save_btn">保存</a>
			<a href="#" class="btn"	data-dismiss="modal">关闭</a>
		</div>
	</div>
	<div id="delete_modal" class="modal hide fade in" style="display: none;">
		<div class='modal-header'>
			<a class="close" data-dismiss="modal">X</a>
			<h3>提示</h3>
		</div>
		<div class="modal-body">
			<input  id="delete_id" name="delete_id" type="hidden" value=""/>
			确认删除？
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-success" id="delete_confirm">删除</a>
			<a href="#" class="btn"	data-dismiss="modal">关闭</a>
		</div>
	</div>
</body>
<link href="vendors/datepicker/bootstrap-datepicker.css" rel="stylesheet" media="screen">


<script src="vendors/jquery-1.9.1.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/datatables/js/jquery.dataTables.js"></script>
<script src="assets/scripts.js"></script>
<script src="assets/DT_bootstrap.js"></script>
<script src="vendors/datepicker/bootstrap-datepicker.js"></script>


<script language="javascript">
$(function() {
    $("#arriveTime").datepicker({
        format: 'yyyy-MM-dd',
        language: 'zh',
        weekStart: 1,
        autoclose: true,
        clearBtn:true,
        todayHighlight:true
      });
});


$(document).ready(function(){
	$("#add_detail_btn").click(function(){
	  	var now = new Date(); 
        $("#form_modal #title").text("添加路线");
        $("#form_modal #id").val("");
        $("#form_modal #billNo").val($(this).attr("data-id"));
        $("#form_modal #arriveAddress").val("");
        $("#form_modal #arriveTime").val(date2Str(now));
        $("#form_modal #remark").val("");
        $("#form_modal #action").val("add");
        $('#form_modal').modal({keyboard:false,show:true});
    });

	$(".edit_detail_btn").click(function(){
        $("#form_modal #title").text("更新路线");
        $("#form_modal #id").val($(this).attr("data-id"));
        $("#form_modal #billNo").val($(this).attr("data-billNo"));
        $("#form_modal #arriveAddress").val($(this).attr("data-arriveAddress"));
        $("#form_modal #arriveTime").val($(this).attr("data-arriveTime"));
        $("#form_modal #remark").val($(this).attr("data-remark"));
        $("#form_modal #action").val("update");
        $('#form_modal').modal({keyboard:false,show:true});
    });
	
  	$("#save_btn").click(function(){
	  $.ajax({ 
		  type:"post", 
		  async:false,
		  url:"BillDetailOP.php", 
		  data:{    
		  	action : $("#form_modal #action").val(),    
		  	billNo : $("#form_modal #billNo").val(),    
		  	arriveAddress : $("#form_modal #arriveAddress").val(),    
		  	arriveTime : $("#form_modal #arriveTime").val(),    
		  	remark : $("#form_modal #remark").val(),    
		  	id : $("#form_modal #id").val()  
	      },   
		  success: function(data){
			  window.location.reload();
			  $("#form_modal").modal("hide");
	      },
	      error : function(data) {    
	          alert(data);    
	     } 
      });
  });

  	$(".delete_detail_btn").click(function(){
  		$('#delete_modal').modal({keyboard:false,show:true});
  		$('#delete_modal #delete_id').val($(this).attr("data-id"));
    });

  $("#delete_confirm").click(function(){
		$.ajax({ 
			  type:"post", 
			  async:false,
			  url:"BillDetailOP.php", 
			  data:{    
			  	action : "delete",    
			  	id : $("#delete_id").val()
		      },   
			  success: function(data){
				  window.location.reload();
				  $("#delete_modal").modal("hide");
		      },
		      error : function(data) {    
		          alert(data);    
		     } 
	    });
  });
  
});

function date2Str(date){
	var year = date.getFullYear();
	var month = date.getMonth()+1;
	var day = date.getDate();
	var dateStr= year;  
	if(month>9)  
		dateStr = dateStr +"-"+month;  
	else
		dateStr = dateStr +"-0"+month;  
	if(date>9)  
		dateStr = dateStr +"-"+day;  
	else
		dateStr = dateStr +"-0"+day;  
	return dateStr;  
}
</script>
</html>