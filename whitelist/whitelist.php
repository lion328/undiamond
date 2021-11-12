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
.style5 {color: #FF0000; font-weight: bold; }
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="save_whitelist.php">
  <div align="center"> &nbsp;ชื่อผู้ใช้:  
    <label>
    <input name="username" type="text" id="username" maxlength="<?
		include("../config.php");
		echo $authmemaxusername
        ?>" />
    </label>
    <span class="style2"><?
      include("../config.php");
	  echo "*ไม่น้อยกว่า ".$authmeminpassword." และไม่มากว่า ".$authmemaxpassword;
	  ?></span><br />
  รหัสผ่าน: 
  <label>
  <input name="password" type="password" id="password" maxlength="<?
		include("../config.php");
		echo $authmemaxpassword
        ?>" />
  </label>
  <span class="style2">
  <?
      include("../config.php");
	  echo "*ไม่น้อยกว่า ".$authmeminpassword." และไม่มากว่า ".$authmemaxpassword;
	  ?></span><br />
  <br />
  <span class="style5">*กรุณาใช้ชื่อผู้ใช้เป็น A-Z, a-z และ 0-9 เท่านั้น หากใส่ตัวอักษรตัวอื่นลงไป อาจทำให้เข้าเกมไม่ได้</span><br />
  <br />
  เหตุผล:<br />
  <label>
  <textarea name="reason" id="reason" cols="45" rows="10"  onfocus="clearText(this)">กรุณาใส่เหตุผลที่ดี และใช้สมองคิด</textarea>
  </label>
  <p>
    <label>
    <input type="submit" name="button" id="button" value="ขอไวท์ลิสต์" />
    </label>
  </p>
  </div>
</form>
</body>


</html>
