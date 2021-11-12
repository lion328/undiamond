<?
	include("/../config.php");
	error_reporting (E_ALL ^ E_NOTICE);
	session_start();
	$unsafeValue = stripslashes($_GET['user']);
	$unsafeValue = addslashes($unsafeValue);
	mysql_connect($mysqlhostname,$mysqlusername,$mysqlpassword);
	mysql_select_db($mysqldatabase);
	$xauthpass = md5($_GET['pass']);
	$strSQL = "SELECT * FROM ".$authmetable." WHERE username = '".trim($unsafeValue)."' 
	and password = '".trim($xauthpass)."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "NO";
	}
	else
	{
			echo "YES";
	}
	mysql_close();
?>