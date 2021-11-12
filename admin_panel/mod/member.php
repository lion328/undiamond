<?php require_once('../../Connections/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
include("../../config.php");
mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT * FROM ".$authmetable." ORDER BY id ASC";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div align="center">
  <p>
    <?
	error_reporting (E_ALL ^ E_NOTICE);
	session_start();
	if($_SESSION["coreid"] == "")
	{
		echo "กรุณาเข้าสู่ระบบก่อนเข้าหน้านี้";
		exit();
	}
?>
    <br />
    <strong>รายชื่อสมาชิก  </strong><br />
  </p>
  <table width="602" border="0">
    <tr>
      <td width="131" bgcolor="#666666"><div align="center"><span class="style1">ชื่อผู้ใช้</span></div></td>
      <td width="234" bgcolor="#666666"><div align="center"><span class="style1">รหัสผ่านที่เข้ารหัส</span></div></td>
      <td width="140" bgcolor="#666666"><div align="center"><span class="style1">ไอพี</span></div></td>
      <td width="79" bgcolor="#666666"><div align="center"><span class="style1">ลบ</span></div></td>
    </tr>
    <?php do { ?>
      <tr>
        <td bgcolor="#CCCCCC"><?php echo $row_Recordset1['username']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_Recordset1['password']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_Recordset1['ip']; ?></td>
        <td bgcolor="#CCCCCC"><form id="form1" name="form1" method="post" action="">
          <label>
          <div align="center">
            <input type="submit" name="button" id="button" value="คลิก" />
            <input name="id" type="hidden" id="id" value="<?php echo $row_Recordset1['id']; ?>" />
            </div>
            </label>
                                  </form></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
