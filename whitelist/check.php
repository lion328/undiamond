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
<center>
<form id="form1" name="form1" method="post" action="check.php">
  ชื่อผู้ใช้: 
    <label>
  
  <input type="text" name="username" id="username" />
  </label>
  <label>
  
  <input type="submit" name="button" id="button" value="ตรวจสอบ" />
  </label>
  <input name="isrock" type="hidden" id="isrock" value="what" />
  <br />
  <br />
<?
	error_reporting (E_ALL ^ E_NOTICE);
	
	if($_POST["isrock"] == "")
	{
		exit();
	}
	include("../config.php");
	
	mysql_connect($mysqlhostname,$mysqlusername,$mysqlpassword);
	mysql_select_db($mysqldatabase);
	mysql_query("SET NAMES UTF8");
	$strSQL = "SELECT * FROM ".$authmetable." WHERE username = '".trim($_POST['username'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$strSQL2 = "SELECT * FROM wait_whitelist WHERE username = '".trim($_POST['username'])."' ";
	$objQuery2 = mysql_query($strSQL2);
	$objResult2 = mysql_fetch_array($objQuery2);
	if($objResult2 == $objResult && $objResult == "" && $objResult2 == "")
	{
		echo "ชื่อผู้ใช้งานผู้นี้ไม่มีในฐานข้อมูล";
		exit();
	}
	if($objResult2 != "" || $objResult == "")
	{
		echo "ชื่อผู้ใช้งานผู้นี้ยังไม่ได้รับการยืนยัน";
		exit();
	}
	if($objResult != "")
	{
		echo "ชื่อผู้ใช้งานผู้นี้ได้รับการยืนยันเรียบร้อยแล้ว";
		exit();
	}

?>
</form></center>
</body>

</html>
