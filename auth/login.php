<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>
function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
}
</script>
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
.style2 {color: #FF0000}
-->
</style></head>

<body>
<?
include("/../config.php");

	session_start();
	$unsafeValue = stripslashes($_POST['user']);
	$unsafeValue = addslashes($unsafeValue);
	mysql_connect($mysqlhostname,$mysqlusername,$mysqlpassword);
	mysql_select_db($mysqldatabase);
	$xauthpass = md5($_POST['pass']);
	$strSQL = "SELECT * FROM ".$authmetable." WHERE username = '".trim($unsafeValue)."' 
	and password = '".trim($xauthpass)."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "<center>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</center>";
	}
	else
	{
			$_SESSION["id"] = $objResult["id"];

			session_write_close();

			header("location:page.php");
	}
	mysql_close();
?>
</body>
</html>


