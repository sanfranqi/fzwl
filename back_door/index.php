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
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
				</a> 
				<a class="brand" href="#">方舟物流</a>
				<div class="nav-collapse collapse">
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> 
								<i class="icon-user"></i>管理员<i class="caret"></i>
							</a>
							<ul class="dropdown-menu">
<!-- 								<li><a tabindex="-1" href="#">密码修改</a></li> -->
								<li class="divider"></li>
								<li><a tabindex="-1" href="login.php" id="logout">退出</a></li>
							</ul>
						</li>
					</ul>
<!-- 					<ul class="nav"> -->
<!-- 						<li class="active"><a href="#">Dashboard</a></li> -->
<!-- 					</ul> -->
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3" id="sidebar">
				<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
					<li class="active">
						<a href="index.php">
							<i class="icon-chevron-right"></i>运单管理
						</a>
					</li>
				</ul>
			</div>
			<!--/span-->
			<div class="span9" id="content">
				<div class="row-fluid">
					<!-- block -->
					<div class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left">运单列表</div>
						</div>
						<div class="block-content collapse in">
							<div class="span11">
								<div class="table-toolbar">
									<div class="btn-group">
										<a href="#">
											<button class="btn btn-success" id="add_btn">添加
												<i class="icon-plus icon-white"></i>
											</button>
										</a>
									</div>
<!-- 									<div class="btn-group pull-right"> -->
<!-- 										<button data-toggle="dropdown" class="btn dropdown-toggle"> -->
<!-- 											Tools <span class="caret"></span> -->
<!-- 										</button> -->
<!-- 										<ul class="dropdown-menu"> -->
<!-- 											<li><a href="#">Print</a></li> -->
<!-- 											<li><a href="#">Save as PDF</a></li> -->
<!-- 											<li><a href="#">Export to Excel</a></li> -->
<!-- 										</ul> -->
<!-- 									</div> -->
								</div>
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="page_table">
									<thead>
										<tr>
											<th>运单号</th>
											<th>日期</th>
											<th>备注</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody>
                                         <?PHP
											include ('../back_door/class/Bill.php');
											$bill = new Bill ();
											$results = $bill->getBillList ();
											$exist = false;
											// 循环显示记录
// 											while ( $row = $results->fetch_row () ) {
											while ( $row = mysql_fetch_array($results) ) {
												$exist = true;
										 ?>
										<tr class="odd gradeX">
											<td><?php echo($row[1]); ?></td>
											<td><?php echo(date('Y-m-d',$row[3])); ?></td>
											<td><?php echo($row[2]); ?></td>
											<td align="center">
												<a href="#">
													<button id="edit_btn" class="btn btn-success edit_btn" data-id="<?php echo($row[0]);?>" data-billNo="<?php echo($row[1]);?>" data-remark="<?php echo($row[2]);?>" data-addTime="<?php echo(date('Y-m-d',$row[3]));?>">更新</button>
												</a>
												&nbsp;&nbsp;&nbsp;&nbsp;
												<a href="#">
													<button id="delete_btn" class="btn btn-success delete_btn" data-id="<?php echo($row[0]);?>">删除</button>
												</a>
												&nbsp;&nbsp;&nbsp;&nbsp;
												<a href="#">
													<button id="conf_btn" class="btn btn-success conf_btn" data-id="<?php echo($row[1]);?>">配置</button>
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
			<h3 id="title">添加运单</h3>
		</div>
		<div class="modal-body">
			<form class="form-horizontal">
				<fieldset>
					<input  id="id" name="id" type="hidden" value=""/>
					<input  id="action" name="action" type="hidden" value="add"/>
                	<div class="control-group">
	                	<label class="control-label" for="focusedInput">运单号</label>
	                 	<div class="controls">
	        				<input class="input-xlarge focused" id="billNo" name="billNo" type="text" value="1111200000"/>
	        			</div>
                   	</div>
                   	<div class="control-group">
                    	<label class="control-label" for="date01">日期</label>
                        <div class="controls">
                        	<input type="text" class="input-xlarge date" id="addTime" name="addTime" value="<?php echo(date('Y-m-d'))?>" readonly="readonly"/>
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
    $("#addTime").datepicker({
        format: 'yyyy-MM-dd',
        language: 'zh',
        weekStart: 1,
        autoclose: true,
        clearBtn:true,
        todayHighlight:true
      });
});


$(document).ready(function(){

	$("#add_btn").click(function(){
	  	var now = new Date(); 
        $("#form_modal #title").text("添加运单");
        $("#form_modal #id").val("");
        $("#form_modal #billNo").val("1111200000");
        $("#form_modal #addTime").val(date2Str(now));
        $("#form_modal #remark").val("");
        $("#form_modal #action").val("add");
        $('#form_modal').modal({keyboard:false,show:true});
    });

	$(".edit_btn").click(function(){
        $("#form_modal #title").text("更新运单");
        $("#form_modal #id").val($(this).attr("data-id"));
        $("#form_modal #billNo").val($(this).attr("data-billNo"));
        $("#form_modal #addTime").val($(this).attr("data-addTime"));
        $("#form_modal #remark").val($(this).attr("data-remark"));
//         $.ajax({ 
//   		  type:"post", 
//   		  async:false,
//   		  dataType:"json",
//   		  url:"BillOP.php", 
//   		  data:{    
//   		  	action : "get",    
//   		  	id : $(this).attr("data-id")    
//   	      },   
//   		  success: function(data){
//   	  		alert(1);
//   	  		alert(data);
//   	  		var obj = $.parseJSON(data);
//   	  		alert(obj.id);
//   	        $("#form_modal #billNo").val();
//   	        $("#form_modal #addTime").val();
//   	        $("#form_modal #remark").val();
//   	      },
//   	      error : function(data,a) {  
//   	    	 alert(data);    
//   	         alert(a);    
//   	     } 
//         });
        $("#form_modal #action").val("update");
        $('#form_modal').modal({keyboard:false,show:true});
    });
	
  	$("#save_btn").click(function(){
  		var billNo = $("#billNo").val();
	  	var addTime = $("#addTime").val();
	  	var action = $("#action").val();
	  	var id = $("#id").val();

  		if(billNo=="null"||billNo==""||billNo.length!=10){
		  	$("#form_modal #billNo").focus();
			alert("运单号输入错误!");	
			return;
	  	}
	  	var prefix = billNo.substr(0, 5);
	  	if(prefix!="11112"){
			$("#form_modal #billNo").focus();
			alert("运单号输入错误!");	
			return;
		}
	  
	  $.ajax({ 
		  type:"post", 
		  async:false,
		  url:"BillOP.php", 
		  data:{    
		  	action : action,    
		  	billNo : billNo,    
		  	remark : $("#remark").val(),    
		  	addTime : addTime,
		  	id: id  
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

  	$(".delete_btn").click(function(){
  		$('#delete_modal').modal({keyboard:false,show:true});
  		$('#delete_modal #delete_id').val($(this).attr("data-id"));
    });

  $("#delete_confirm").click(function(){
		$.ajax({ 
			  type:"post", 
			  async:false,
			  url:"BillOP.php", 
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

  $(".conf_btn").click(function(){
// 	  $.ajax({ 
// 		  type:"post", 
// 		  async:false,
// 		  url:"index.php", 
// 		  data:{    
// 		  	id : $(this).attr("data-id")
// 	      },   
// 		  success: function(data){
// 			  $("#content").css("display","none");
// 		      $("#content_detail").css("display","block");
// 	      },
// 	      error : function(data) {    
// 	          alert(data);    
// 	     } 
//     });
	  var oth="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=200";
	  oth = oth+",width=800,height=600";
	  var billNo = $(this).attr("data-id");
	  var bill_detail=window.open("bill_detail.php?billNo="+billNo,"BillDetail",oth);
	  bill_detail.focus();
	  return false;
      
  });


  $("#logout").click(function(){
		$.ajax({ 
			  type:"post", 
			  async:false,
			  url:"UserOP.php", 
			  data:{    
			  	action : "logout" 
		      },   
			  success: function(data){
				  document.location=index.php;
		      },
		      error : function(data) {    
		          alert("");    
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

//+--------------------------------------------------- 
//| 日期合法性验证 
//| 格式为：YYYY-MM-DD或YYYY/MM/DD 
//+--------------------------------------------------- 
function isValidDate(DateStr){
	alert(DateStr);
	var sDate=DateStr.replace(/(^\s+|\s+$)/g,''); //去两边空格; 
	if(sDate=='') returntrue; 
	//如果格式满足YYYY-(/)MM-(/)DD或YYYY-(/)M-(/)DD或YYYY-(/)M-(/)D或YYYY-(/)MM-(/)D就替换为'' 
	//数据库中，合法日期可以是:YYYY-MM/DD(2003-3/21),数据库会自动转换为YYYY-MM-DD格式 
	var s = sDate.replace(/[\d]{ 4,4 }[\-/]{ 1 }[\d]{ 1,2 }[\-/]{ 1 }[\d]{ 1,2 }/g,'');
	if (s==''){  //说明格式满足YYYY-MM-DD或YYYY-M-DD或YYYY-M-D或YYYY-MM-D 
		var t=new Date(sDate.replace(/\-/g,'/')); 
		var ar = sDate.split(/[-/:]/); 
		if(ar[0] != t.getYear() || ar[1] != t.getMonth()+1 || ar[2] != t.getDate()){ 
			//alert('错误的日期格式！格式为：YYYY-MM-DD或YYYY/MM/DD。注意闰年。'); 
			return false; 
		} 
	}else{ 
	//alert('错误的日期格式！格式为：YYYY-MM-DD或YYYY/MM/DD。注意闰年。'); 
		return false; 
	} 
	return true; 
} 

</script>
</html>