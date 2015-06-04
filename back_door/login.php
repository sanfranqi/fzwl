<!DOCTYPE html>
<html>
<head>
<title>管理员登录</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
<link href="assets/styles.css" rel="stylesheet" media="screen">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body id="login">
	<div class="container">
		<form class="form-signin">
			<h2 class="form-signin-heading">登录</h2>
			<input type="hidden" name="action" value="login" /> 
			<input type="text" class="input-block-level" id="username" name="username" placeholder="请输入用户名" /> 
			<input type="password" class="input-block-level" id="password" name="password" placeholder="请输入密码" /> 
			<label class="checkbox"> 
<!-- 			<input type="checkbox" value="remember-me"> Remember me </label> -->
			<button class="btn btn-large btn-primary" id="login_btn" type="button">确定</button>
		</form>
	</div>
	<!-- /container -->
	<script src="vendors/jquery-1.9.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
<script language="javascript">
$(document).ready(function(){
  $("#login_btn").click(function(){
		$.ajax({ 
		  type:"post", 
		  async:false,
		  url:"UserOP.php", 
		  data:{    
		  	action : "login",
		  	username:$("#username").val(), 
		  	password:$("#password").val()
	      },   
		  success: function(data){
			  window.location.href="index.php"; 
	      },
	      error : function(data) {    
	          window.location.href="index.php";   
	     } 
	   });
	});
});
</script>
</html>