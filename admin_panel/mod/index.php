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
	include("../../config.php");
	error_reporting (E_ALL ^ E_NOTICE);
	session_start();
	if($_SESSION["coreid"] == "")
	{
		echo "กรุณาเข้าสู่ระบบก่อนเข้าหน้านี้";
		exit();
	}
	mysql_connect($mysqlhostname,$mysqlusername,$mysqlpassword);
	mysql_select_db($mysqldatabase);
	$strSQL = "SELECT * FROM moderator WHERE id = '".$_SESSION["coreid"]."'";
	$objQuery = mysql_query($strSQL);	
	$objResult = mysql_fetch_array($objQuery);
	echo "ยินดีต้อนรับคุณ ".$objResult["username"];
?>
<br />
<br />
<a href="whitelist.php">ดูรายชื่อผู้ขอไวท์ลิสต์</a><br />
<a href="member.php">ดูรายชื่อผู้สมัครสมาชิก</a><br />
<a href="changepass.php">เปลี่ยนรหัสผ่าน</a><br />
<a href="../logout.php">ออกจากระบบ</a>
</body>

</html>
