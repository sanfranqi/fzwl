<?PHP include('/class/User.php'); ?>
<?PHP
	$user = new User();
	$StrAction=$_POST["action"];
	$username=trim($_POST["username"]);
	$password=trim($_POST["password"]);
	$user->username=$username;
	$user->password=$password;
	if ($StrAction=="login")  {
		session_start();
		$results = $user->login();
		if ($row = $results->fetch_row ()) {
			$_SESSION["is_admin_login"]=true;
// 			header("Location: index.php");
		}else{
			$_SESSION["is_admin_login"]=false;
// 			header("Location: login.php");
		}
		
	}elseif ($StrAction=="logout"){
		session_start ();
		$_SESSION ["is_admin_login"]=false;
		header("Location: login.php");
	}
	else{
		
	} 
	
?>
