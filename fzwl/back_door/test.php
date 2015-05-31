<!DOCTYPE html>
<html>
<meta charset='utf-8'>
<head>
	<title>bootstrap拟态框</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"
		media="screen">
	<script src="vendors/jquery-1.9.1.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	<div class='container'>
		<h4>我是拟态框的例子</h4>
		<div id='example' class='modal hide fade in' style='display: none;'>
			<div class='modal-header'>
				<a class='close' data-dismiss='modal'>X</a>
				<h3>我是拟态框的头部</h3>
			</div>
			<div class='modal-body'>
				<h4>我是拟态框的中间部分</h4>
				<p>我是描述部分</p>
			</div>
			<div class='modal-footer'>
				<a href='#' class='btn btn-success'>成功</a> <a href='#' class='btn'
					data-dismiss='modal'>关闭</a>
			</div>
		</div>
		<p>
			<a href='#example' data-toggle='modal'
				class='btn btn-primary btn-large'>点我弹出拟态框</a>
		</p>
	</div>

</body>
</html>