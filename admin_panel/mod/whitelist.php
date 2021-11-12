<?php require_once('../../Connections/localhost.php'); ?>
<?php
error_reporting (E_ALL ^ E_NOTICE);
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

mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT * FROM wait_whitelist ORDER BY id ASC";
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
<div align="center"><strong>รายชื่อผู้ขอไวท์ลิสต์</strong>
</div>
<table width="632" height="76" border="0" align="center">
  <tr>
    <td width="142" bgcolor="#333333"><div align="center" class="style1">ชื่อผู้ใช้</div></td>
    <td width="205" bgcolor="#333333"><div align="center" class="style1">เหตุผล</div></td>
    <td width="117" bgcolor="#333333"><div align="center" class="style1">รับ</div></td>
    <td width="117" bgcolor="#333333"><div align="center" class="style1">ลบ</div></td>
  </tr>
  <?
  	error_reporting (E_ALL ^ E_NOTICE);
	session_start();
	if($_SESSION["coreid"] == "")
	{
		echo "กรุณาเข้าสู่ระบบก่อนเข้าหน้านี้";
		exit();
	}
  ?>
  <?php do { ?>
    <tr>
      <td height="54" bgcolor="#999999"><?php echo $row_Recordset1['username']; ?></td>
      <td bgcolor="#999999"><?php echo $row_Recordset1['reason']; ?></td>
      <td bgcolor="#999999"><form id="form1" name="form1" method="post" action="add_whitelist.php">
          <div align="center">
            <input type="submit" name="button" id="button" value="คลิก" />
            <input name="id" type="hidden" id="id" value="<?php echo $row_Recordset1['id']; ?>" />
          </div>
      </form></td>
      <td bgcolor="#999999"><form id="form2" name="form1" method="post" action="del_whitelist.php">
          <div align="center">
            <input type="submit" name="button2" id="button2" value="คลิก" />
            <input name="id" type="hidden" id="id" value="<?php echo $row_Recordset1['id']; ?>" />
          </div>
      </form></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
