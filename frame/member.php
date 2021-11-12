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
session_start();
error_reporting (E_ALL ^ E_NOTICE);
	if($_SESSION['id'] != "")
	{

		header("location:..\\auth\\page.php");
		
	}
?>
<center>
<form id="form1" name="form1" method="post" action="../auth/login.php">
  <label>  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <input name="user" type="text" id="user" value="ชื่อผู้ใช้" onfocus="clearText(this)"/>
  </label>
  <label>
  <input name="pass" type="password" id="pass" value="รหัสผ่าน" onfocus="clearText(this)"/>
  </label>
  <label>
  <input type="submit" name="button" id="button" value="เข้าสู่ระบบ" />
  </label>
</form>
</center>

</body>
</html>
