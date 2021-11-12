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
.style2 {color: #FF0000}
-->
</style></head>

<body>
<p>
  <?
  	error_reporting (E_ALL ^ E_NOTICE);
	include("../../config.php");
	$userlen = strlen($_POST['username']);
	$passlen = strlen($_POST['password']);
	mysql_connect($mysqlhostname,$mysqlusername,$mysqlpassword);
	mysql_select_db($mysqldatabase);
	mysql_query("SET NAMES UTF8");
	
	error_reporting (E_ALL ^ E_NOTICE);
	session_start();
	
	if($_SESSION["coreid"] == "")
	{
		echo "กรุณาเข้าสู่ระบบก่อนเข้าหน้านี้";
		exit();
	}
?>
</p>
<center>
  <form id="form1" name="form1" method="post" action="save_edit.php">
    <table width="259" height="139" border="0" align="center">
      <tr>
        <td width="115">รหัสผ่านเก่า:</td>
        <td width="213"><label>
          <input name="oldpass" type="password" id="oldpass" maxlength="<?
		include("../config.php");
		echo $authmemaxpassword
        ?>" />
        </label></td>
      </tr>
      <tr>
        <td>รหัสผ่านใหม่:</td>
        <td><input name="newpass" type="password" id="newpass" maxlength="<?
		include("../config.php");
		echo $authmemaxpassword
        ?>" /></td>
      </tr>
      <tr>
        <td>ยืนยันรหัสผ่านใหม่:</td>
        <td><label>
          <input name="fin_newpass" type="password" id="fin_newpass" maxlength="<?
		include("../config.php");
		echo $authmemaxpassword
        ?>" />
        </label></td>
      </tr>
      <tr>
        <td colspan="2"><label>
            <div align="center">
              <input type="submit" name="save" id="save" value="บันทึก" />
            </div>
          </label></td>
      </tr>
    </table>
  </form>
</center>
<p>&nbsp; </p>
</body>
</html>
