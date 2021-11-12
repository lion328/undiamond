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
<p>
  <?
include("/../config.php");
	session_start();
	error_reporting (E_ALL ^ E_NOTICE);
	if($_SESSION['id'] == "")
	{
		echo "<center>กรุณาเข้าสู่ระบบก่อนเข้าหน้านี้ด้วย<center>";
		exit();
	}
	
	mysql_connect($mysqlhostname,$mysqlusername,$mysqlpassword);
	mysql_select_db($mysqldatabase);
	$strSQL = "SELECT * FROM ".$authmetable." WHERE id = '".$_SESSION['id']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
ยินดีต้อนรับคุณ <?=$objResult["username"];?> ครับ ^^
</p>
<p><a href="edit.php">เปลี่ยนรหัสผ่าน</a><br />
    <a href="https://www.tmtopup.com/topup/?uid=13780">บริจาค</a><br />
  <a href="logout.php">ออกจากระบบ</a></p>
</body>
</html>
