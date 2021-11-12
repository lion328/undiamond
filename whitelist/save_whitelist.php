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
	include("../config.php");
	$userlen = strlen($_POST['username']);
	$passlen = strlen($_POST['password']);
	mysql_connect($mysqlhostname,$mysqlusername,$mysqlpassword);
	mysql_select_db($mysqldatabase);
	mysql_query("SET NAMES UTF8");
	
	if($_POST['username'] == "" || $_POST['password'] == "" || $_POST['reason'] == "" || $_POST['reason'] == "กรุณาใส่เหตุผลที่ดี และใช้สมองคิด")
	{
		echo "กรุณาใส่ข้อมูลให้ครบถ้วน!";
		exit();
	}	
	
	$strSQL = "SELECT * FROM ".$authmetable." WHERE username = '".trim($_POST['username'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$strSQL2 = "SELECT * FROM wait_whitelist WHERE username = '".trim($_POST['username'])."' ";
	$objQuery2 = mysql_query($strSQL2);
	$objResult2 = mysql_fetch_array($objQuery2);
	if($userlen < $authmeminusername || $passlen < $authmeminpassword || $userlen > $authmemaxusername || $passlen > $authmemaxpassword)
	{
		echo "ชื่อผู้ใชต้องไม่น้อยกว่า ".$authmeminusername." และไม่มากกว่า ".$authmemaxusername;
		echo "รหัสผ่านต้องไม่น้อยกว่า ".$authmeminpassword." และไม่มากกว่า ".$authmemaxpassword;
		exit();
	}
	if($objResult["username"] != "" || $objResult2["username"] != "")
	{
			echo "ชื่อนี้มีผู้ใช้งานแล้ว";
			exit();
	}
	else
	{	
		
		$strSQL0 = "INSERT INTO wait_whitelist (username,passwordhash,reason) VALUES ('".$_POST["username"]."', 
		'".md5($_POST["password"])."','".$_POST["reason"]."')";
		$objQuery0 = mysql_query($strSQL0);
		
		echo "ลงชื่อไวท์ลิสต์เรียบร้อย กรุณารอผู้ดูแลเซิฟเวอร์มายืนยัน รอดูผลได้ที่หน้าตรวจไวท์ลิสต์เลยครับ<br>";		
		
	}

	mysql_close();
?>

</html>
