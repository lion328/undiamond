<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

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
	
		if($_POST['id'] == "")
	{
		echo "กรุณาใส่ข้อมูลให้ครบถ้วน!";
		exit();
	}	
	
	$strSQL2 = "SELECT * FROM ".$authmetable." WHERE id = '".trim($_POST['id'])."' ";
	$objQuery2 = mysql_query($strSQL2);
	$objResult2 = mysql_fetch_array($objQuery2);
		
		$strSQL3 = "DELETE FROM ".$authmetable." ";
		$strSQL3 .="WHERE id = '".$_POST["id"]."' ";
		$objQuery3 = mysql_query($strSQL3);
		
		echo "ลบเรียบร้อย";		

	mysql_close();
?>
</body>
</html>
