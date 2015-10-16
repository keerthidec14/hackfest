<?php 
	//Include Config File
	require 'config.php';

	$connection=mysql_connect($databasehost,$mysqlusername,$mysqlpassword);
	if(!$connection)
	{
		die("Database connection failed: ".mysql_error());
	}
	$db_select=mysql_select_db($databasename,$connection);
	if(!$db_select)
	{
		die("Database selection failed: ".mysql_error());
	}	
	
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
	
	
	if(isset($_POST['name']) and isset($_POST['pass']))
	{
		$user=$_POST['name'];
		$pass=$_POST['pass'];
		$sql="SELECT * FROM users 
				WHERE username='{$user}'";
				$result = mysql_query($sql); 
				$noofrows = mysql_affected_rows();
			if($noofrows!=1)
			{
				echo "<script>window.parent.location.reload()</script>";
				exit(0);
			}
			while($data = mysql_fetch_assoc($result))
			{
				$hashedpass=$data['password'];
				$salt=$data['salt'];
				$uid=$data['id'];
			}
			$checkpass=sha1($pass.$salt);
			echo "<script>alert($checkpass);</script>";
			if($hashedpass!=$checkpass)
			{
				echo "<script>window.parent.location.reload()</script>";
				exit(0);
			}
			$cook=generateRandomString();
			setcookie('cok', $cook, time() + (3600), "/"); //1 hour
			$sql="Update users set cookie='{$cook}'
				WHERE id='{$uid}'";
			$result = mysql_query($sql); 

	}
	else
	{
		echo "<script>window.parent.location.reload()</script>";
		exit(0);
	}
?>
<html>
<head>
<title>VERIFY</title>
</head>
<script>window.parent.location.reload();</script>
<body>

 <script>
 //Inter frame communication
 parent.postMessage("success","*");
 </script>
</body>
</html>