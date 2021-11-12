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
	color: #FF9900;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FF9900;
}
a:hover {
	text-decoration: underline;
	color: #FFCC00;
}
a:active {
	text-decoration: none;
	color: #FF9900;
}
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style></head>
<body>
<?
	include("/../config.php");
	error_reporting (E_ALL ^ E_NOTICE);
	session_start();
	$unsafeValue = stripslashes($_POST['username']);
	$unsafeValue = addslashes($unsafeValue);
	mysql_connect($mysqlhostname,$mysqlusername,$mysqlpassword);
	mysql_select_db($mysqldatabase);
	$xauthpass = md5($_POST['password']);
	$strSQL = "SELECT * FROM moderator WHERE username = '".trim($unsafeValue)."' 
	and password = '".trim($xauthpass)."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "ชื่อหรือรหัสผ่านไม่ถูกต้อง";
	}
	else
	{
			$_SESSION["coreid"] = $objResult["id"];
			if($objResult["step"] == "admin")
			{
				$_SESSION["step"] = "admin";
			}
			else
			{
				$_SESSION["step"] = "mod";
			}
			header("location:mod/index.php");
	}
	mysql_close();
?>
</body>
</html>
