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
<form id="form1" name="form1" method="post" action="save_edit.php">
  <table width="452" height="139" border="0" align="center">
    <tr>
      <td width="105">รหัสผ่านเก่า:</td>
      <td width="154"><label>
        <input name="oldpass" type="password" id="oldpass" maxlength="<?
		include("../config.php");
		echo $authmemaxpassword
        ?>" />
      </label></td>
      <td width="154">&nbsp;</td>
    </tr>
    <tr>
      <td>รหัสผ่านใหม่:</td>
      <td><input name="newpass" type="password" id="newpass" maxlength="<?
		include("../config.php");
		echo $authmemaxpassword
        ?>" /></td>
      <td><span class="style2">
	  <?
      include("../config.php");
	  echo "*ไม่น้อยกว่า ".$authmeminpassword." และไม่มากว่า ".$authmemaxpassword;
	  ?></span></td>
    </tr>
    <tr>
      <td>ยืนยันรหัสผ่านใหม่:</td>
      <td><label>
        <input name="fin_newpass" type="password" id="fin_newpass" maxlength="<?
		include("../config.php");
		echo $authmemaxpassword
        ?>" />
      </label></td>
      <td><span class="style2"><?
      include("../config.php");
	  echo "*ไม่น้อยกว่า ".$authmeminpassword." และไม่มากว่า ".$authmemaxpassword;
	  ?></span></td>
    </tr>
    <tr>
      <td colspan="3"><label>
        <div align="center">
          <input type="submit" name="save" id="save" value="บันทึก" />
          </div>
      </label></td>
    </tr>
  </table>
</form>
</body>

</html>
