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
	include("../../config.php");
	session_start();
	error_reporting (E_ALL ^ E_NOTICE);
	if($_SESSION['coreid'] == "")
	{
		echo "<center>กรุณาเข้าสู่ระบบก่อนเข้าหน้านี้center>";
		exit();
	}
	mysql_connect($mysqlhostname,$mysqlusername,$mysqlpassword);
	mysql_select_db($mysqldatabase);
	$checkstrSQL = "SELECT * FROM moderator WHERE id = '".$_SESSION['coreid']."' ";
	$checkobjQuery = mysql_query($checkstrSQL);
	$checkobjResult = mysql_fetch_array($checkobjQuery);
	$newpasslen = strlen($_POST['newpass']);
	$fin_newpasslen = strlen($_POST['fin_newpass']);
	if(md5(trim($_POST['oldpass'])) != $checkobjResult["password"])
	{
		echo "รหัสผ่านเก่าไม่ถูกต้อง!";
		exit();
	}
	
	if($_POST['newpass'] == "" || $_POST['fin_newpass'] == "")
	{
		echo "กรุณาใส่ข้อมูลให้ครบถ้วน!";
		exit();
	}
	
	if($_POST['newpass'] != $_POST['fin_newpass'])
	{
		echo "รหัสผ่านใหม่ไม่ตรงกัน!";
		exit();
	}

	$strSQL = "UPDATE moderator SET password = '".md5(trim($_POST['newpass']))."' 
	WHERE id = '".$_SESSION["coreid"]."' ";
	$objQuery = mysql_query($strSQL);
	
	echo "บันทึกเรียบร้อย<br>";		
	
	mysql_close();
?>

</body>
</html>
