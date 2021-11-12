<?php 
error_reporting (E_ALL ^ E_NOTICE);
require_once('Connections/localhost.php');
?>
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
$query_Recordset1 = "SELECT * FROM welcome ORDER BY id DESC";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_localhost, $localhost);
$query_Recordset2 = "SELECT * FROM title ORDER BY id DESC";
$Recordset2 = mysql_query($query_Recordset2, $localhost) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?><html>
<head>
<title>:: <?php echo $row_Recordset2['title']; ?> ::</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<style type="text/css">
<!--
body {
	background-color: #1374BE;
}
body,td,th {
	font-family: Tahoma;
	font-size: 12px;
	color: #1374BE;
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
-->
</style>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/button_1_02.png','images/button_1_03.png','images/button_1_04.png','images/button_1_05.png')">
<!-- ImageReady Slices (Untitled-1.psd) -->
<br>
<table width="1000" height="570" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
  <!--DWLayoutTable-->
<tr>
		<td colspan="6">
			<img src="images/index_01.png" width="1000" height="108" alt=""></td>
  </tr>
	<tr>
		<td>
			<img src="images/index_02.png" width="38" height="20" alt=""></td>
		<td colspan="3" bgcolor="#FFFFFF"><marquee scrollamount="3" scrolldelay="5" onMouseOver=this.stop() onMouseOut=this.start()><?php echo $row_Recordset1['text']; ?></marquee></td>
		<td colspan="2">
			<img src="images/index_04.png" alt="" width="131" height="20" onClick="MM_goToURL('parent','admin_panel');return document.MM_returnValue"></td>
  </tr>
	<tr>
		<td colspan="6">
			<img src="images/index_05.png" width="1000" height="43" alt=""></td>
	</tr>
	<tr>
		<td height="176">
			<img src="images/index_06.png" width="38" height="176" alt=""></td>
		<td width="190" valign="top"><img src="images/button_0_01.png" width="190" height="11"><br>
	    <a href="frame/index.php" target="mainframe" onMouseOver="MM_swapImage('Image19','','images/button_1_02.png',1)" onMouseOut="MM_swapImgRestore()"><img src="images/button_0_02.png" name="Image19" width="190" height="36" border="0"><br>
	    </a><a href="frame/whitelistmenu.php" target="mainframe" onMouseOver="MM_swapImage('Image20','','images/button_1_03.png',1)" onMouseOut="MM_swapImgRestore()"><img src="images/button_0_03.png" name="Image20" width="190" height="34" border="0"></a><br>
	    <a href="frame/download.php" target="mainframe" onMouseOver="MM_swapImage('Image21','','images/button_1_04.png',1)" onMouseOut="MM_swapImgRestore()"><img src="images/button_0_04.png" name="Image21" width="190" height="39" border="0"></a><br>
	    <a href="frame/member.php" target="mainframe" onMouseOver="MM_swapImage('Image22','','images/button_1_05.png',1)" onMouseOut="MM_swapImgRestore()"><img src="images/button_0_05.png" name="Image22" width="190" height="35" border="0"></a><br>
	    <img src="images/button_0_06.png" width="190" height="21"></td>
		<td>
			<img src="images/index_08.png" width="30" height="176" alt=""></td>
		<td colspan="2" rowspan="2" valign="top" bgcolor="#FFFFFF"><iframe name="mainframe" src="frame/index.php" width="685" height="347" frameborder="0"></iframe> </td>
      <td rowspan="2">
			<img src="images/index_10.png" width="50" height="353" alt=""></td>
	</tr>
	<tr>
		<td height="177">
			<img src="images/index_11.png" width="38" height="177" alt=""></td>
		<td colspan="2">
			<img src="images/index_12.png" width="220" height="177" alt=""></td>
    </tr>
	<tr>
		<td colspan="6">
			<img src="images/index_13.png" width="1000" height="45" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="38" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="190" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="30" height="1" alt=""></td>
		<td width="611">
			<img src="images/spacer.gif" width="611" height="1" alt=""></td>
		<td width="81">
			<img src="images/spacer.gif" width="81" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="50" height="1" alt=""></td>
	</tr>
</table>
<br>
<!-- End ImageReady Slices -->
</body>
</html>