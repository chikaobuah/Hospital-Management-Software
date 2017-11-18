<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_localhost = "localhost";
$database_localhost = "newmed06";
$username_localhost = "root";
$password_localhost = "";
$localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR); 

define("C_DB_HOST",$hostname_localhost);
        define("C_DB_USER",$username_localhost);
        define("C_DB_PASS",$password_localhost);
        define("C_DB_NAME",$database_localhost);

?>