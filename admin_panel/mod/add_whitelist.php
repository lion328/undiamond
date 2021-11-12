<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Tahoma;
	font-size: 12px;
}
a:link {
	color: #CC6600;
	text-decoration: none;
}
a:visited {
	color: #CC6600;
	text-decoration: none;
}
a:hover {
	color: #FFCC00;
	text-decoration: underline;
}
a:active {
	color: #CC6600;
	text-decoration: none;
}
-->
</style></head>

<body>
</body>
<?
	error_reporting (E_ALL ^ E_NOTICE);
	session_start();
	if($_SESSION["coreid"] == "")
	{
		echo "กรุณาเข้าสู่ระบบก่อนเข้าหน้านี้";
		exit();
	}
	include("../../config.php");
	$userlen = strlen($_POST['username']);
	$passlen = strlen($_POST['password']);
	mysql_connect($mysqlhostname,$mysqlusername,$mysqlpassword);
	mysql_select_db($mysqldatabase);
	mysql_query("SET NAMES UTF8");
	
	if($_POST['id'] == "")
	{
		echo "กรุณาใส่ข้อมูลให้ครบถ้วน!";
		exit();
	}	
	
	$strSQL = "SELECT * FROM ".$authmetable." WHERE username = '".trim($_POST['username'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$strSQL2 = "SELECT * FROM wait_whitelist WHERE id = '".trim($_POST['id'])."' ";
	$objQuery2 = mysql_query($strSQL2);
	$objResult2 = mysql_fetch_array($objQuery2);
		
		$strSQL0 = "INSERT INTO ".$authmetable." (username,password) VALUES ('".$objResult2["username"]."', 
		'".$objResult2["passwordhash"]."')";
		$objQuery0 = mysql_query($strSQL0);
		$strSQL3 = "DELETE FROM wait_whitelist ";
		$strSQL3 .="WHERE id = '".$_POST["id"]."' ";
		$objQuery3 = mysql_query($strSQL3);
		
		echo "รับเป็นสมาชิกเรียบร้อย";		

	mysql_close();
?>

</html>
