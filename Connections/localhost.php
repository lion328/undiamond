<?php
error_reporting (E_ALL ^ E_NOTICE);
include("config.php");
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_localhost = $mysqlhostname;
$database_localhost = $mysqldatabase;
$username_localhost = $mysqlusername;
$password_localhost = $mysqlpassword;
$localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8");
?>
